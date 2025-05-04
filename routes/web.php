<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrProductos;
use App\Http\Controllers\ReportePedidoController;
use App\Http\Controllers\TallaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //mostrar lista de qe y productos ra
    Route::get('/productos/realidad-virtual',[QrProductos::class,'mostrarLista'])->name('productos.qr');

    Route::get('/empleado',[EmpleadoController::class,'createEmpleado'])->name('empleado.create');
    Route::post('/empleado', [EmpleadoController::class, 'storeEmpleado'])->name('empleado.store');

    Route::get('/cargo',[CargoController::class,'createCargo'])->name('cargo.create');
    Route::post('/cargo', [CargoController::class, 'storeCargo'])->name('cargo.store');

    Route::get('/cliente',[ClienteController::class,'createPersona'])->name('cliente.create');
    Route::post('/cliente', [ClienteController::class, 'storePersona'])->name('cliente.store');


    // listar productos
    Route::get('/lista-productos', [ProductoController::class, 'listarProductos'])->name('producto.lista');
    Route::get('/producto', [ProductoController::class, 'viewProduct'])->name('producto.view');
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('/productos/save', [ProductoController::class, 'store'])->name('productos.store');

    Route::get('/categoria',[CategoriaController::class,'createCategoria'])->name('categoria.create');
    Route::post('/categoria', [CategoriaController::class, 'storeCategoria'])->name('categoria.store');

    Route::get('/talla',[TallaController::class,'createTalla'])->name('talla.create');
    Route::post('/talla', [TallaController::class, 'storeTalla'])->name('talla.store');

    Route::get('/color',[ColorController::class,'createColor'])->name('color.create');
    Route::post('/color', [ColorController::class, 'storeColor'])->name('color.store');

    Route::get('/precio',[PrecioController::class,'createPrecio'])->name('precio.create');
    Route::post('/precio', [PrecioController::class, 'storePrecio'])->name('precio.store');

    Route::get('/pedido',[PedidoController::class,'create'])->name('pedido.create');
    Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');

    // reportes
    Route::get('/reporte-pedidos', [ReportePedidoController::class, 'generarPDF'])->name('reporte.pedidos');


});

require __DIR__.'/auth.php';
