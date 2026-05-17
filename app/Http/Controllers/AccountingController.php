<?php

namespace App\Http\Controllers;

use App\Models\MovimientoContable;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    /**
     * Display the financial metrics, ledger history, and sales orders.
     */
    public function index()
    {
        // 1. Ensure at least one default general client exists for orders
        Cliente::firstOrCreate(
            ['email' => 'general@wonka.com'],
            [
                'nombre' => 'Consumidor',
                'apellido' => 'General',
                'usuario' => 'general',
                'clave_hash' => bcrypt('general123'),
                'estado' => 'activo'
            ]
        );

        // 2. Query data
        $movimientos = MovimientoContable::orderBy('id', 'desc')->get();
        $productos = Producto::orderBy('nombre')->get();
        $clientes = Cliente::where('estado', 'activo')->get();
        
        // Query pending & completed sell orders
        $pedidos = Pedido::with('cliente')
            ->where('tipo', 'venta')
            ->orderBy('id', 'desc')
            ->get();

        // 3. Financial calculations
        $totalIngresos = MovimientoContable::where('tipo', 'ingreso')->sum('monto');
        $totalEgresos = MovimientoContable::where('tipo', 'egreso')->sum('monto');
        $margenNeto = $totalIngresos - $totalEgresos;

        return view('Accounting', compact(
            'movimientos',
            'productos',
            'clientes',
            'pedidos',
            'totalIngresos',
            'totalEgresos',
            'margenNeto'
        ));
    }

    /**
     * Store a new pending sales order.
     */
    public function storeOrder(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ], [
            'id_cliente.required' => 'El cliente es obligatorio.',
            'id_producto.required' => 'El producto es obligatorio.',
            'cantidad.required' => 'La cantidad de cajas es obligatoria.',
            'precio_unitario.required' => 'El precio por caja es obligatorio.',
        ]);

        $total = floatval($request->cantidad) * floatval($request->precio_unitario);

        // Create the pending sales order (No impact in ledger yet!)
        $pedido = Pedido::create([
            'id_cliente' => $request->id_cliente,
            'fecha' => date('Y-m-d'),
            'tipo' => 'venta',
            'total' => $total,
            'estado' => 'pendiente'
        ]);

        // Note: We also store the product and quantity details inside a session or helper if needed,
        // but since we link lot withdrawals directly to this order in Inventory, we can save the target
        // product name/id inside a temporary metadata or description, or read it dynamically.
        // Let's store a custom description or tag so the inventory withdrawal knows which product is requested.
        // Even simpler: the details_pedido links the order to the lote when fulfilled.
        
        return redirect('/Accounting')->with('success', "¡Pedido de Venta #{$pedido->id} registrado con éxito como PENDIENTE! Recuerda que no afectará el balance contable hasta que se despache (retire) del inventario.");
    }
}
