<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    VeiculoController,
    DtsrController,
    ProprietarioController,
    PedidoController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Pedidos

Route::middleware('auth')->group(
    function() {
        Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.index');
        Route::get('/veiculo/add', [VeiculoController::class, 'create'])->name('veiculo.create');
        Route::post('/veiculo/store', [VeiculoController::class, 'store'])->name('veiculo.store');
        Route::get('/veiculo/{id}/edit', [VeiculoController::class, 'edit'])->name('veiculo.edit');
        Route::put('/veiculo/{id}', [VeiculoController::class, 'update'])->name('veiculo.update');
        Route::delete('/veiculo/{id}', [VeiculoController::class, 'destroy'])->name('veiculo.destroy');
    }
);

// Veiculo

Route::middleware('auth')->group(
    function() {
        Route::get('/veiculo', [VeiculoController::class, 'index'])->name('veiculo.index');
        Route::get('/veiculo/add', [VeiculoController::class, 'create'])->name('veiculo.create');
        Route::post('/veiculo/store', [VeiculoController::class, 'store'])->name('veiculo.store');
        Route::get('/veiculo/{id}/edit', [VeiculoController::class, 'edit'])->name('veiculo.edit');
        Route::put('/veiculo/{id}', [VeiculoController::class, 'update'])->name('veiculo.update');
        Route::delete('/veiculo/{id}', [VeiculoController::class, 'destroy'])->name('veiculo.destroy');
    }
);

// DTSR

Route::middleware('auth')->group(
    function() {
        Route::get('/dtsr', [DtsrController::class, 'index'])->name('dtsr.index');
    }
);

// Proprietario

Route::middleware('auth')->group(
    function() {
        Route::get('/proprietario', [ProprietarioController::class, 'index'])->name('proprietario.index');
        Route::get('/proprietario/veiculo/create', [ProprietarioController::class, 'create'])
        ->name('proprietario.create');
        Route::post('/proprietario/store', [ProprietarioController::class, 'store'])->name('proprietario.store');
    }
);

// Auth

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
