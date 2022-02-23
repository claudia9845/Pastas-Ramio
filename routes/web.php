<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TipoPastaController;
use App\Http\Controllers\ProductoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//rutas tipo de pasta
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tipopasta/registrar', [TipoPastaController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tipopasta/data', [TipoPastaController::class, 'indexData']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tipopasta', [TipoPastaController::class, 'index'])->name('tipopasta');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tipopasta/gettipopasta', [TipoPastaController::class, 'gettipopasta']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/tipopasta/actualizar', [TipoPastaController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tipopasta/eliminar', [TipoPastaController::class, 'destroy']);


//rutas de producto
Route::middleware(['auth:sanctum', 'verified'])->post('/api/producto/registrar', [ProductoController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/producto/data', [ProductoController::class, 'indexData']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/producto', [ProductoController::class, 'index'])->name('producto');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/producto/getProducto', [ProductoController::class, 'getProducto']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/producto/actualizar', [ProductoController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/producto/eliminar', [ProductoController::class, 'destroy']);



