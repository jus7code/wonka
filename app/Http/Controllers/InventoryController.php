<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\LineaProduccion;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display the inventory catalog and statistics.
     */
    public function index()
    {
        // Fetch all batches with their product, category, and production line
        $lotes = Lote::with(['producto.categoria', 'lineaProduccion'])->orderBy('created_at', 'desc')->get();

        // Calculate dynamic summary stats
        $totalInventory = $lotes->where('estado', 'en_stock')->sum('cantidad');
        $activeBatches = $lotes->where('estado', 'en_stock')->count();
        
        // Low stock alerts (active batches with quantity < 10 boxes)
        $lowStockAlerts = $lotes->where('estado', 'en_stock')->where('cantidad', '<', 10)->count();
        
        // Storage capacity: represent dynamically as a % of 1,000 boxes capacity limit
        $storageCapacity = min(100, max(0, round(($totalInventory / 1000) * 100)));

        $productos = Producto::orderBy('nombre')->get();
        $pedidosPendientes = Pedido::with('cliente')
            ->where('tipo', 'venta')
            ->where('estado', 'pendiente')
            ->orderBy('id', 'desc')
            ->get();

        return view('Inventory', compact(
            'lotes',
            'productos',
            'pedidosPendientes',
            'totalInventory',
            'activeBatches',
            'lowStockAlerts',
            'storageCapacity'
        ));
    }

    /**
     * Show the form for registering a new batch.
     */
    public function showRegister()
    {
        $lineas = LineaProduccion::orderBy('nombre')->get();
        $productos = Producto::orderBy('nombre')->get();
        return view('BatchRegister', compact('lineas', 'productos'));
    }

    /**
     * Store a newly registered batch.
     */
    public function register(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|string',
            'nombre' => 'required_if:id_producto,new|nullable|string|max:150',
            'precio_unitario' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
            'fecha_ingreso' => 'required|date',
            'id_linea_produccion' => 'nullable|string',
            'nueva_linea_nombre' => 'required_if:id_linea_produccion,new|nullable|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ], [
            'id_producto.required' => 'La selección del producto es obligatoria.',
            'nombre.required_if' => 'El nombre del producto es obligatorio para nuevos productos.',
            'precio_unitario.required' => 'El precio unitario es obligatorio.',
            'precio_unitario.numeric' => 'El precio unitario debe ser un número.',
            'cantidad.required' => 'La cantidad del lote es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date' => 'La fecha de ingreso no es una fecha válida.',
            'nueva_linea_nombre.required_if' => 'El nombre de la nueva línea de procesamiento es obligatorio.',
            'imagen.image' => 'El archivo subido debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de formato jpeg, png, jpg, webp o gif.',
            'imagen.max' => 'La imagen no debe pesar más de 5 MB.',
        ]);

        // Find or create a default category
        $categoria = Categoria::firstOrCreate(
            ['nombre' => 'General'],
            ['descripcion' => 'Categoría general para nuevos productos']
        );

        // Handle Image Upload if present
        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Ensure directory exists
            if (!file_exists(public_path('uploads/products'))) {
                mkdir(public_path('uploads/products'), 0777, true);
            }
            
            $file->move(public_path('uploads/products'), $filename);
            $imagenPath = 'uploads/products/' . $filename;
        }

        // Resolve product (either existant or new)
        $producto = null;
        if ($request->id_producto === 'new') {
            $producto = Producto::create([
                'nombre' => $request->nombre,
                'id_categoria' => $categoria->id,
                'precio_unitario' => $request->precio_unitario,
                'unidad_medida' => 'kg',
                'tipo_empaque' => 'Caja estándar',
                'imagen' => $imagenPath
            ]);
        } else {
            $producto = Producto::findOrFail($request->id_producto);
            // Update image if a new one is uploaded
            if ($imagenPath) {
                $producto->imagen = $imagenPath;
            }
            // Update unit price on product if changed in form
            if ($request->filled('precio_unitario')) {
                $producto->precio_unitario = $request->precio_unitario;
            }
            $producto->save();
        }

        // Resolve LineaProduccion id
        $idLinea = null;
        if ($request->id_linea_produccion === 'new' && $request->filled('nueva_linea_nombre')) {
            $linea = LineaProduccion::firstOrCreate(['nombre' => $request->nueva_linea_nombre]);
            $idLinea = $linea->id;
        } elseif (is_numeric($request->id_linea_produccion)) {
            $idLinea = $request->id_linea_produccion;
        }

        // Generate a unique QR Code string
        $qrCode = 'BATCH-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));

        // Create the new Batch (Lote)
        Lote::create([
            'id_producto' => $producto->id,
            'id_linea_produccion' => $idLinea,
            'cantidad' => $request->cantidad,
            'estado' => 'en_stock',
            'fecha_ingreso' => $request->fecha_ingreso,
            'qr_code' => $qrCode
        ]);

        // Record expense in Movimientos Contables
        $costoTotal = $request->cantidad * $request->precio_unitario;
        \App\Models\MovimientoContable::create([
            'monto' => $costoTotal,
            'tipo' => 'egreso',
            'fecha' => $request->fecha_ingreso,
            'descripcion' => "Registro de nuevo lote: " . $producto->nombre . " (" . $qrCode . ") - " . $request->cantidad . " cajas"
        ]);

        return redirect('/inventory')->with('success', '¡El lote ' . $qrCode . ' fue registrado exitosamente!');
    }

    /**
     * Withdraw a quantity from an existing batch.
     */
    public function withdraw(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|string|exists:lotes,qr_code',
            'cantidad' => 'required|integer|min:1',
            'motivo' => 'required|string|in:venta,dañado,perdido',
            'id_pedido' => 'required_if:motivo,venta|nullable|exists:pedidos,id',
        ], [
            'qr_code.required' => 'El código QR del lote es obligatorio.',
            'qr_code.exists' => 'El código QR proporcionado no existe en nuestro inventario.',
            'cantidad.required' => 'La cantidad a retirar es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad a retirar debe ser al menos 1.',
            'motivo.required' => 'El motivo del retiro es obligatorio.',
            'motivo.in' => 'El motivo de retiro no es válido.',
            'id_pedido.required_if' => 'Debe seleccionar el pedido de venta para este despacho.',
            'id_pedido.exists' => 'El pedido de venta seleccionado no existe.',
        ]);

        $lote = Lote::with('producto')->where('qr_code', $request->qr_code)->firstOrFail();

        if ($lote->estado !== 'en_stock') {
            return redirect('/inventory')->withErrors(['withdraw' => 'Este lote ya no se encuentra en stock (Estado actual: ' . $lote->estado . ').']);
        }

        if ($lote->cantidad < $request->cantidad) {
            return redirect('/inventory')->withErrors(['withdraw' => 'Stock insuficiente. Solo quedan ' . $lote->cantidad . ' cajas disponibles en este lote.']);
        }

        // Deduct quantity
        $lote->cantidad -= $request->cantidad;

        // If batch reaches 0, mark it as out of stock
        if ($lote->cantidad === 0) {
            $lote->estado = 'agotado';
        }
        $lote->save();

        $producto = $lote->producto;
        $motivo = $request->motivo;

        if ($motivo === 'dañado' || $motivo === 'perdido') {
            // Damaged/Lost represents a direct negative outcome (egreso)
            $montoMerma = floatval($request->cantidad) * floatval($producto->precio_unitario);
            
            \App\Models\MovimientoContable::create([
                'id_pedido' => null,
                'monto' => $montoMerma,
                'tipo' => 'egreso',
                'fecha' => date('Y-m-d'),
                'descripcion' => "Pérdida por lote " . ($motivo === 'dañado' ? 'dañado' : 'perdido') . ": " . $producto->nombre . " (" . $lote->qr_code . ") - " . $request->cantidad . " cajas"
            ]);

            return redirect('/inventory')->with('success', 'Se retiraron ' . $request->cantidad . ' cajas por merma (' . $motivo . '). Se registró el gasto correspondiente en la contabilidad.');
        } elseif ($motivo === 'venta') {
            // Sale links to the Sales Order
            $pedido = Pedido::findOrFail($request->id_pedido);

            // Record Detail Pedido line
            DetallePedido::create([
                'id_pedido' => $pedido->id,
                'id_lote' => $lote->id,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $producto->precio_unitario
            ]);

            // Complete the order!
            $pedido->estado = 'completado';
            $pedido->save();

            // Record dynamic positive income value (ingreso) linked to order placement!
            $montoVenta = floatval($request->cantidad) * floatval($producto->precio_unitario);
            
            \App\Models\MovimientoContable::create([
                'id_pedido' => $pedido->id,
                'monto' => $montoVenta,
                'tipo' => 'ingreso',
                'fecha' => date('Y-m-d'),
                'descripcion' => "Fulfillment Venta - Pedido #" . $pedido->id . " para " . $pedido->cliente->nombre . " " . $pedido->cliente->apellido . " (Lote: " . $lote->qr_code . ", " . $request->cantidad . " cajas)"
            ]);

            return redirect('/inventory')->with('success', '¡El lote fue despachado para el pedido #' . $pedido->id . ' con éxito! Se completó el pedido y se registró el ingreso de venta.');
        }

        return redirect('/inventory')->with('success', 'Se retiraron con éxito ' . $request->cantidad . ' cajas del lote ' . $lote->qr_code . '.');
    }

    /**
     * Delete a batch entirely.
     */
    public function destroy($id)
    {
        $lote = Lote::findOrFail($id);
        $qrCode = $lote->qr_code;
        $lote->delete();

        return redirect('/inventory')->with('success', 'El lote ' . $qrCode . ' ha sido eliminado permanentemente.');
    }

    /**
     * Manufacture a new composite product from existing stocks.
     */
    public function craft(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:productos,nombre',
            'precio_unitario' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:1',
            'ingrediente_id' => 'required|array',
            'ingrediente_cant' => 'required|array',
            'imagen_opcion' => 'required|string', // 'upload' or 'design'
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'diseno_envoltura_png' => 'nullable|string', // base64 string
        ], [
            'nombre.required' => 'El nombre del nuevo producto es obligatorio.',
            'nombre.unique' => 'Ya existe un producto registrado con ese nombre.',
            'precio_unitario.required' => 'El precio de venta es obligatorio.',
            'cantidad.required' => 'La cantidad a fabricar es obligatoria.',
            'ingrediente_id.required' => 'Debe agregar al menos un ingrediente.',
        ]);

        // 1. Verify enough stock of all ingredients
        $ingredientes = [];
        foreach ($request->ingrediente_id as $index => $ingId) {
            if (!isset($request->ingrediente_cant[$index])) continue;
            
            $cantPorUnidad = floatval($request->ingrediente_cant[$index]);
            $cantRequerida = $cantPorUnidad * intval($request->cantidad);
            if ($cantRequerida <= 0) continue;

            $ingredienteProducto = Producto::findOrFail($ingId);
            // Calculate total stock currently available
            $stockDisponible = Lote::where('id_producto', $ingId)->where('estado', 'en_stock')->sum('cantidad');

            if ($stockDisponible < $cantRequerida) {
                return redirect()->back()->withErrors([
                    'stock' => "Stock insuficiente de '{$ingredienteProducto->nombre}'. Se requieren {$cantRequerida} cajas para esta producción, pero solo hay {$stockDisponible} cajas disponibles."
                ]);
            }

            $ingredientes[] = [
                'producto' => $ingredienteProducto,
                'cantidad' => $cantRequerida
            ];
        }

        if (empty($ingredientes)) {
            return redirect()->back()->withErrors(['stock' => 'Debe seleccionar al menos un ingrediente válido con cantidad mayor a cero.']);
        }

        // 2. Consume ingredient stocks from oldest to newest batches (FIFO)
        foreach ($ingredientes as $item) {
            $productoIng = $item['producto'];
            $restoAConsumir = $item['cantidad'];

            $lotesActivos = Lote::where('id_producto', $productoIng->id)
                ->where('estado', 'en_stock')
                ->orderBy('fecha_ingreso', 'asc')
                ->get();

            foreach ($lotesActivos as $lote) {
                if ($restoAConsumir <= 0) break;

                if ($lote->cantidad > $restoAConsumir) {
                    $lote->cantidad -= $restoAConsumir;
                    $lote->save();
                    $restoAConsumir = 0;
                } else {
                    $restoAConsumir -= $lote->cantidad;
                    $lote->cantidad = 0;
                    $lote->estado = 'agotado';
                    $lote->save();
                }
            }
        }

        // 3. Save Product Image (upload or canvas)
        $imagenPath = 'uploads/products/default_chocolate.png';
        if ($request->imagen_opcion === 'upload' && $request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('uploads/products'))) {
                mkdir(public_path('uploads/products'), 0777, true);
            }
            $file->move(public_path('uploads/products'), $filename);
            $imagenPath = 'uploads/products/' . $filename;
        } elseif ($request->imagen_opcion === 'design' && $request->filled('diseno_envoltura_png')) {
            // Process base64 PNG image
            $base64Data = $request->diseno_envoltura_png;
            if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
                $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
                $base64Data = base64_decode($base64Data);
                
                $filename = 'design_' . time() . '_' . uniqid() . '.png';
                if (!file_exists(public_path('uploads/products'))) {
                    mkdir(public_path('uploads/products'), 0777, true);
                }
                file_put_contents(public_path('uploads/products/' . $filename), $base64Data);
                $imagenPath = 'uploads/products/' . $filename;
            }
        }

        // 4. Create the new composite product
        $categoria = Categoria::firstOrCreate(
            ['nombre' => 'Compuestos'],
            ['descripcion' => 'Categoría para productos compuestos o fabricados']
        );
        
        $nuevoProducto = Producto::create([
            'nombre' => $request->nombre,
            'id_categoria' => $categoria->id,
            'precio_unitario' => $request->precio_unitario,
            'unidad_medida' => 'kg',
            'tipo_empaque' => 'Caja premium',
            'imagen' => $imagenPath,
            'descripcion' => $request->descripcion
        ]);

        // 5. Register the new batch in stock
        $qrCode = 'BATCH-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));
        Lote::create([
            'id_producto' => $nuevoProducto->id,
            'id_linea_produccion' => null,
            'cantidad' => $request->cantidad,
            'estado' => 'en_stock',
            'fecha_ingreso' => date('Y-m-d'),
            'qr_code' => $qrCode
        ]);

        return redirect('/inventory')->with('success', "¡El producto compuesto '" . $request->nombre . "' fue fabricado con éxito y se redujo el stock de ingredientes!");
    }
}
