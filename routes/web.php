<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HumanResourcesController;

// Authentication Routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Language Switcher Route (Publicly Accessible)
Route::get('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'es'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('locale.switch');

// Protected ERP Routes
Route::middleware(['auth', 'role.auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Dashboard');
    });

    // Human Resources Management Routes
    Route::get('/humanresources', [HumanResourcesController::class, 'index'])->name('hr.index');
    Route::post('/humanresources/hire', [HumanResourcesController::class, 'hire'])->name('hr.hire');
    Route::post('/humanresources/employee/{id}/update', [HumanResourcesController::class, 'update'])->name('hr.update');
    Route::post('/humanresources/shift/assign', [HumanResourcesController::class, 'assignShift'])->name('hr.shift.assign');
    Route::post('/humanresources/shift/request', [HumanResourcesController::class, 'requestShiftAction'])->name('hr.shift.request');
    Route::post('/humanresources/shift/request/{id}/approve', [HumanResourcesController::class, 'approveRequest'])->name('hr.shift.approve');
    Route::post('/humanresources/shift/request/{id}/reject', [HumanResourcesController::class, 'rejectRequest'])->name('hr.shift.reject');

    Route::get('/Accounting', [AccountingController::class, 'index']);
    Route::post('/Accounting/order', [AccountingController::class, 'storeOrder'])->name('accounting.order');

    // Inventory and Batch Management Routes
    Route::get('/inventory', [InventoryController::class, 'index']);
    Route::post('/inventory/withdraw', [InventoryController::class, 'withdraw'])->name('inventory.withdraw');
    Route::post('/inventory/craft', [InventoryController::class, 'craft'])->name('inventory.craft');
    Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

    Route::get('/batchregister', [InventoryController::class, 'showRegister']);
    Route::post('/batchregister', [InventoryController::class, 'register'])->name('batchregister.store');

    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::get('/OrderChocolate', function () {
        $productos = \App\Models\Producto::whereHas('categoria', function ($query) {
            $query->where('nombre', 'Compuestos');
        })->with('categoria')->orderBy('nombre')->get();
        
        $cliente = null;
        $pedidos = collect();
        
        if (auth()->check()) {
            $cliente = \App\Models\Cliente::where('email', auth()->user()->email)
                                          ->orWhere('usuario', auth()->user()->name)
                                          ->first();
            if ($cliente) {
                $pedidos = \App\Models\Pedido::where('id_cliente', $cliente->id)
                                             ->orderBy('id', 'desc')
                                             ->take(5)
                                             ->get();
            }
        }
        
        return view('OrderChocolate', compact('productos', 'cliente', 'pedidos'));
    })->name('order.chocolate');

    Route::post('/OrderChocolate/place', [ClientController::class, 'placeOrder'])->name('order.place');

    Route::get('/Clients', [ClientController::class, 'index']);
    Route::post('/Clients', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/Clients/{id}', [ClientController::class, 'update'])->name('clients.update');
});

