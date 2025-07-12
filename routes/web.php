<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    VeiculoController,
    DtsrController,
    ProprietarioController,
    PedidoController,
    RoleAbilityController,
    UserController,
    MatriculaController,
    MultaController,
    NotificacaoController,
    AlertaController,
    User,
    ConfirmacaoController
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return view('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Multas

Route::middleware('auth')->group(
    function() {

        Route::post('/multa/store/{id}/{user_id}/', [MultaController::class, 'store'])->middleware('can:atribuir_multa')->name('multa.store');

    }
);


// Notificações

// Route::get('/', function () {
//     return view('index');
// })->name('notificacao.home');

Route::get('/notificar/detalhes', function() {
    return view('notificoes.furtos_acidentes_roubos.details');
});




Route::middleware('auth')->group(
    function() {

        Route::get('/notificacao/index/{id}/', [NotificacaoController::class, 'index'])->name('notificacao.index');

        Route::get('/notificacao/{id}', [NotificacaoController::class, 'show'])->name('notificacao.show');

        Route::get('/notificacao/create', [NotificacaoController::class, 'create'])->name('notificacao.create');

        Route::get('/alertas', [AlertaController::class, 'index'])->name('notificacao.alertas.index');

        Route::post('/alertas/store', [AlertaController::class, 'store'])->name('notificacao.alertas.store');

        Route::get('/alertas/{id}', [AlertaController::class, 'show'])->name('alertas.show');
    
        Route::get('/tiposdealerta/{id}', [AlertaController::class, 'alertaportipo'])->name('alertas.tipo');

        Route::get('/alertas/list/{id}', [AlertaController::class, 'list'])->name('alertas.list');
    }
);

Route::middleware('auth')->group(function () {
    // Criar confirmação
    Route::post('confirmacoes/store/{id}', [ConfirmacaoController::class, 'store'])->name('confirmacao.store');
    
    // Remover confirmação
    Route::delete('confirmacoes/delete/{id}', [ConfirmacaoController::class, 'destroy'])->name('confirmacao.destroy');
});


// Matricula

Route::middleware('auth')->group(
    function() {   
        Route::put('/matricula/{id}/', [MatriculaController::class, 'gerarMatricula'])->name('matricula.update');
    }
);

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


        // Users

        Route::get('/users/create', [UserController::class, 'create'])->middleware('can:edit_permission')->name('user.create');

        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('can:edit_permission')->name('user.edit');

        Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
    }
);

// Pedidos

Route::middleware('auth')->group(
    function() {

        // [Listar] Pedidos

        Route::get('/pedidos', [PedidoController::class, 'index'])->middleware('can:ver_pedidos')->name('pedido.index');

        // [Mostrar ou Ler] Pedido

        Route::get('/pedido/{id}', [PedidoController::class, 'show'])->middleware('can:ver_pedido')->name('pedido.show');

        // [Criar] Pedido de Matricula e Emissão(?)

        Route::get('/pedido/create/{tipoPedido}', [PedidoController::class, 'createMatriculaEmissao'])->middleware('can:registar_pedido')->name('pedido.create');

        Route::post('/pedido/store', [PedidoController::class, 'storeMatriculaEmissao'])->middleware('can:registar_pedido')->name('pedido.store');


        // [Criar] Alteração de Caracteristicas e Duplicados

        
        Route::post('/pedido/create/acd/{id}/{tipoPedido}', [PedidoController::class, 'storeAlteracaoCaracteristicasDuplicados'])->middleware('can:registar_pedido')->name('pedido.acd.store');
        Route::get('/pedido/create/acd/{id}/{tipoPedido}', [PedidoController::class, 'createAlteracaoCaracteristicasDuplicados'])->middleware('can:registar_pedido')->name('pedido.acd.create');

        // [Editar] Pedido
        
        Route::get('/pedido/{id}/edit', [PedidoController::class, 'edit'])->middleware('can:editar_pedido')->name('pedido.edit');
        Route::put('/pedido/{id}/', [PedidoController::class, 'update'])->middleware('can:editar_pedido')->name('pedido.update');

        // [Deletar] Pedido

        Route::delete('/pedido/{id}', [PedidoController::class, 'destroy'])->middleware('can:deletar_pedido')->name('pedido.destroy');

    }
);

// Veiculo

Route::middleware('auth')->group(
    function() {

        // Pedido de Matrícula (Primeira Vez)

        Route::get('/veiculo', [VeiculoController::class, 'index'])->middleware('can:ver_veiculos')->name('veiculo.index');

        Route::get('/veiculo/add', [VeiculoController::class, 'create'])->middleware('can:registar_pedido')->name('veiculo.create');

        Route::post('/veiculo/store', [VeiculoController::class, 'store'])->middleware('can:registar_pedido')->name('veiculo.store');

        Route::get('/veiculo/{id}/edit', [VeiculoController::class, 'edit'])->middleware('can:editar_pedido')->name('veiculo.edit');
        Route::put('/veiculo/{id}', [VeiculoController::class, 'update'])->middleware('can:editar_pedido')->name('veiculo.update');

        Route::delete('/veiculo/{id}', [VeiculoController::class, 'destroy'])->middleware('can:deletar_pedido')->name('veiculo.destroy');
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
