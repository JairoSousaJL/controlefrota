<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'admin'], function(){
    //auth verifica se o usuario está logado quando acessa a rota
    //se n estiver logado redireciona o usuario para a tela declarada na rota do arquivo Middleware/Authenticate.php
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/painel', [\App\Http\Controllers\AdministradorController::class, 'painel'])->name('painel');
        Route::get('/admin/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logoutAdmin');
        //
        //CLIENTE
        // 
        Route::get('/cadastro/cliente', [\App\Http\Controllers\ClienteController::class, 'create'])->name('createCliente');
        Route::post('/post/cadastro/cliente', [\App\Http\Controllers\ClienteController::class, 'store'])->name('storeCliente');
        Route::get('/consultar/cliente', [\App\Http\Controllers\ClienteController::class, 'index'])->name('clientes');
        Route::get('/cliente/{codigo}', [\App\Http\Controllers\ClienteController::class, 'show'])->name('showCliente');
        Route::put('/editar/cliente/{codigo}', [\App\Http\Controllers\ClienteController::class, 'edit'])->name('editCliente');
        Route::post('/excluir/cliente/{codigo}', [\App\Http\Controllers\ClienteController::class, 'destroy'])->name('deleteCliente');
        Route::any('/pesquisar/cliente', [\App\Http\Controllers\ClienteController::class, 'search'])->name('pesquisarClientes');
        //
        //VEÍCULO
        //
        Route::get('/cadastro/veiculo', [\App\Http\Controllers\VeiculoController::class, 'create'])->name('createVeiculo');
        Route::post('/post/cadastro/veiculo', [\App\Http\Controllers\VeiculoController::class, 'store'])->name('storeVeiculo');
        Route::get('/consultar/veiculo', [\App\Http\Controllers\VeiculoController::class, 'index'])->name('veiculos');
        Route::get('/veiculo/{codigo}', [\App\Http\Controllers\VeiculoController::class, 'show'])->name('showVeiculo');
        Route::put('/editar/veiculo/{codigo}', [\App\Http\Controllers\VeiculoController::class, 'edit'])->name('editVeiculo');
        Route::post('/excluir/veiculo/{codigo}', [\App\Http\Controllers\VeiculoController::class, 'destroy'])->name('deleteVeiculo');
        Route::any('/pesquisar/veiculo', [\App\Http\Controllers\VeiculoController::class, 'search'])->name('pesquisarVeiculos');
        //
        //VENDAS VEÍCULOS
        //
        Route::get('/cadastro/venda', [\App\Http\Controllers\VendaController::class, 'create'])->name('createVenda');
        Route::post('/post/cadastro/venda', [\App\Http\Controllers\VendaController::class, 'store'])->name('storeVenda');
        Route::get('/consultar/vendas', [\App\Http\Controllers\VendaController::class, 'index'])->name('vendas');
        Route::any('/pesquisar/venda', [\App\Http\Controllers\VendaController::class, 'search'])->name('pesquisarVendas');
        Route::get('/vendas/{codigo}', [\App\Http\Controllers\VendaController::class, 'show'])->name('showVenda');
        //
        //ENTRADAS CAIXA
        //
        Route::get('/cadastro/entradas', [\App\Http\Controllers\EntradaController::class, 'create'])->name('createEntrada');
        Route::post('/post/cadastro/entradas', [\App\Http\Controllers\EntradaController::class, 'store'])->name('storeEntrada');
        //
        //SAÍDAS CAIXA
        //
        Route::get('/cadastro/saidas', [\App\Http\Controllers\SaidaController::class, 'create'])->name('createSaida');
        Route::post('/post/cadastro/saidas', [\App\Http\Controllers\SaidaController::class, 'store'])->name('storeSaida');
        //
        //RELATÓRIOS
        //
        Route::get('/relatorio', [\App\Http\Controllers\RelatorioController::class, 'relatorio'])->name('relatorios');
        Route::post('/relatorio/vendas', [\App\Http\Controllers\RelatorioController::class, 'gererRelatorioVenda'])->name('relatorioVenda');
        Route::post('/relatorio/entradas', [\App\Http\Controllers\RelatorioController::class, 'gererRelatorioEntrada'])->name('relatorioEntrada');
        Route::post('/relatorio/saidas', [\App\Http\Controllers\RelatorioController::class, 'gererRelatorioSaida'])->name('relatorioSaida');
        //
        //TRANSAÇÕES
        //
        Route::get('/cadastro/transferencia', [\App\Http\Controllers\TransacaoController::class, 'createTransferencia'])->name('createTransferencia');
        Route::get('/cadastro/comunicado', [\App\Http\Controllers\TransacaoController::class, 'createComunicado'])->name('createComunicado');
        Route::post('/cadastro/transferencia', [\App\Http\Controllers\TransacaoController::class, 'storeTransferencia'])->name('storeTransferencia');
        Route::post('/cadastro/comunicado', [\App\Http\Controllers\TransacaoController::class, 'storeComunicado'])->name('storeComunicado');
        //
        //USUÁRIOS - ADMINISTRADOR
        //
        Route::get('/cadastro/usuario', [\App\Http\Controllers\AdministradorController::class, 'create'])->name('createUsuario');
        Route::post('/cadastro/usuario', [\App\Http\Controllers\AdministradorController::class, 'store'])->name('storeAdmin');
        Route::get('/usuarios', [\App\Http\Controllers\AdministradorController::class, 'index'])->name('usuarios');
        Route::get('/perfil/{id}', [\App\Http\Controllers\AdministradorController::class, 'showPerfil'])->name('showPerfil');
        Route::put('/editar/perfil/{codigo}', [\App\Http\Controllers\AdministradorController::class, 'editPerfil'])->name('editPerfil');
        Route::put('/editar/senha/{codigo}', [\App\Http\Controllers\AdministradorController::class, 'editSenha'])->name('editSenha');
        
        
    });
    Route::post('/authAdmin', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('postLogin');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
