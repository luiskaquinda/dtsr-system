<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    VeiculoController,
    DtsrController,
    ProprietarioController,
    PedidoController,
    RoleAbilityController,
    UserController
};

use App\Models\{
    User
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

    // Route::get(
    //     'acl', 
    //     function() {
    
    //         // Auth::loginUsingId(1);

    //         $users = User::all();
            
    //         return view('acl', [
    //             'users' => $users
    //         ]);
    //     }
    // );

Route::get('/', function () {
    return view('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ACL

Route::middleware('auth')->group(
    function() {

        // [Listar] Pedidos

        Route::get('/users', [UserController::class, 'index'])->middleware('can:edit_user')->name('user.index');

        // Role

        Route::get('/roles', [RoleAbilityController::class, 'indexRole'])->middleware('can:edit_roles')->name('role.index');

        Route::get('/roles/create', [RoleAbilityController::class, 'createRole'])->middleware('can:edit_permission')->name('role.create');

        Route::post('/roles/store', [RoleAbilityController::class, 'roleStore'])->name('role.store');

        Route::get('/roles/{id}/edit', [RoleAbilityController::class, 'roleEdit'])->name('role.edit');

        Route::put('/roles/{id}', [RoleAbilityController::class, 'roleUpdate'])->name('role.update');

        Route::delete('/role/{id}', [RoleAbilityController::class, 'roleDestroy'])->name('role.destroy');

        // Ability

        Route::get('/abilities', [RoleAbilityController::class, 'indexAbility'])->middleware('can:edit_roles')->name('ability.index');

        Route::get('/abilities/create', [RoleAbilityController::class, 'createAbility'])->middleware('can:edit_permission')->name('ability.create');

        Route::post('/abilities/store', [RoleAbilityController::class, 'abilityStore'])->name('ability.store');

        Route::get('/abilities/{id}/edit', [RoleAbilityController::class, 'abilityEdit'])->name('ability.edit');

        Route::put('/abilities/{id}', [RoleAbilityController::class, 'abilityUpdate'])->name('ability.update');

        Route::delete('/ability/{id}', [RoleAbilityController::class, 'abilityDestroy'])->name('ability.destroy');

    }
);

// Pedidos

Route::middleware('auth')->group(
    function() {

        // [Listar] Pedidos

        Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedido.index');

        // [Mostrar ou Ler] Pedido

        Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido.show')->middleware('can:cerate_user');

        // [Criar] Pedido de Matricula e Emissão(?)

        Route::get('/pedido/create/{tipoPedido}', [PedidoController::class, 'createMatriculaEmissao'])->name('pedido.create');

        Route::post('/pedido/store', [PedidoController::class, 'storeMatriculaEmissao'])->name('pedido.store');


        // [Criar] Alteração de Caracteristicas e Duplicados

        
        Route::post('/pedido/create/acd/{id}/{tipoPedido}', [PedidoController::class, 'storeAlteracaoCaracteristicasDuplicados'])->name('pedido.acd.store');
        Route::get('/pedido/create/acd/{id}/{tipoPedido}', [PedidoController::class, 'createAlteracaoCaracteristicasDuplicados'])->name('pedido.acd.create');

        // [Editar] Pedido
        
        Route::get('/pedido/{id}/edit', [PedidoController::class, 'edit'])->name('pedido.edit');
        Route::put('/pedido/{id}/', [PedidoController::class, 'update'])->name('pedido.update');

        // [Deletar] Pedido

        Route::delete('/pedido/{id}', [PedidoController::class, 'destroy'])->name('pedido.destroy');

    }
);

// Veiculo

Route::middleware('auth')->group(
    function() {

        // Pedido de Matrícula (Primeira Vez)

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
