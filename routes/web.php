<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PaginasController@inicio')->name('site.inicio');
Route::get('/institucional', 'PaginasController@institucional')->name('site.institucional');
Route::get('/faq', 'PaginasController@faq')->name('site.faq');
Route::get('/planos', 'PaginasController@planos')->name('site.planos');
Route::get('/plano/{slug}', 'PaginasController@plano')->name('site.plano');
Route::get('/contato', 'PaginasController@contato')->name('site.contato');
Route::get('/cadastro', 'PaginasController@cadastro')->name('site.cadastro');
Route::get('/artigos', 'PaginasController@artigos')->name('site.artigos');
Route::get('/artigo/{slug?}', 'PaginasController@artigo')->name('site.artigo');
Route::get('/representantes/{slug?}', 'PaginasController@representantes')->name('site.representantes');
Route::get('/esqueci-minha-senha', 'UserController@esqueci')->name('admin.esqueci');
Route::get('/login', 'UserController@login')->name('login');
Route::get('/redefinir-senha', 'PasswordResetController@redefinir')->name('redefinir-senha');
Route::get('/nova-senha/{token}', 'PasswordResetController@novaSenha')->name('nova-senha');
Route::get('/painel', 'UserController@login')->name('painel');
Route::get('/logout', 'UserController@logout')->name('sair');


// Rotas para painel base
//Route::middleware(['verificaLogin'])->prefix('admin')->group(function(){
Route::middleware(['verificaLogin'])->prefix('admin')->group(function(){

    Route::group(['middleware' => ['verificaAdmin']], function(){
        
        Route::get('/artigos', 'ArtigoController@lista')->name('admin.artigos');
        Route::get('/artigo/{action}/{id?}', 'ArtigoController@formulario')->name('admin.artigo-form');
        Route::post('/deletar-artigo', 'ArtigoController@destroy')->name('admin.deletar-artigo');
        Route::post('/salvar-artigo', 'ArtigoController@salvar')->name('admin.salvar-artigo');

        Route::get('/planos', 'ProdutoController@lista')->name('admin.planos');
        Route::get('/plano/{action}/{id?}', 'ProdutoController@formulario')->name('admin.plano-form');
        Route::post('/deletar-plano', 'ProdutoController@destroy')->name('admin.deletar-plano');
        Route::post('/salvar-plano', 'ProdutoController@salvar')->name('admin.salvar-plano');

        Route::get('/categorias', 'CategoriaController@lista')->name('admin.categorias');
        Route::get('/categoria/{action}/{id?}', 'CategoriaController@formulario')->name('admin.categoria-form');
        Route::post('/deletar-categoria', 'CategoriaController@destroy')->name('admin.deletar-categoria');
        Route::post('/salvar-categoria', 'CategoriaController@salvar')->name('admin.salvar-categoria');

        Route::get('/cadastros', 'CadastroController@lista')->name('admin.cadastros');
        Route::get('/cadastro/{action}/{id?}', 'CadastroController@formulario')->name('admin.cadastro-form');
        Route::post('/deletar-cadastro', 'CadastroController@destroy')->name('admin.deletar-cadastro');
        Route::post('/salvar-cadastro', 'CadastroController@salvar')->name('admin.salvar-cadastro');

        Route::get('/tabelas', 'TabelaController@lista')->name('admin.tabelas');
        Route::get('/tabela/{action}/{id?}', 'TabelaController@formulario')->name('admin.tabela-form');
        Route::post('/salvar-tabela', 'TabelaController@salvar')->name('admin.salvar-tabela');

        Route::post('/deletar-tabela', 'TabelaController@destroy')->name('admin.deletar-tabela');
        
        Route::get('/proposta-infos/{id}', 'PropostaController@informacoes')->name('admin.proposta-infos');
        Route::get('/imprimir-contrato/{id}', 'PropostaController@imprimir')->name('admin.imprimir-proposta');
        Route::post('/status-proposta', 'PropostaController@salvarStatus')->name('admin.status-proposta');
    
        Route::get('/dados-gerais', 'DadosGeraisController@formulario')->name('admin.dados-gerais');
        Route::post('/salvar-dados', 'DadosGeraisController@salvar')->name('admin.salvar-dados');

        Route::get('/users', 'UserController@lista')->name('admin.users');
        Route::post('/deletar-user', 'UserController@destroy')->name('admin.deletar-user');
        Route::get('/user/{action}/{id?}', 'UserController@formulario')->name('admin.user-form');

   
    });

    Route::get('/propostas', 'PropostaController@lista')->name('admin.propostas');
    Route::get('/proposta/{action}/{tipo_proposta}/{id?}', 'PropostaController@formulario')->name('admin.proposta-form');
    Route::post('/deletar-proposta', 'PropostaController@destroy')->name('admin.deletar-proposta');
    Route::post('/salvar-proposta', 'PropostaController@salvar')->name('admin.salvar-proposta');

    
    Route::get('/home', 'PainelController@inicio')->name('admin.home');
    Route::get('/zero', 'PaginasController@zero')->name('admin.zero');
    Route::get('/lista', 'PaginasController@lista')->name('admin.lista');
    Route::post('/deletar-arquivo', 'ArquivoController@destroy')->name('admin.deletar-arquivo');
     
    Route::post('/salvar-user', 'UserController@salvar')->name('admin.salvar-user');
    Route::post('/salvar-senha', 'UserController@salvarSenha')->name('admin.salvar-senha');

    Route::get('/perfil', 'UserController@perfil')->name('admin.perfil');
    

});

// Rotas para painel base
Route::prefix('modal')->group(function(){
    Route::get('/xxx', 'AcessoController@login')->name('admin.xxx');
});



Route::post('/redefinir', 'PasswordResetController@resetar')->name('redefinir');
Route::post('/gerar-nova-senha', 'PasswordResetController@gerarNovaSenha')->name('gerar-nova-senha');





Route::post('/file-upload', 'ArquivoController@upload')->name('arquivo.upload');
Route::post('/entrar', 'UserController@verificar')->name('admin.entrar');





// ResizeImage Intervetion
Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost', 'ImageController@resizeImagePost')->name('resizeImagePost');

Route::post('enviar-email', 'EmailController@contactForm')->name('enviar-email');
Route::post('enviar-orcamento', 'EmailController@orcamentoForm')->name('enviar-orcamento');
Route::post('enviar-cadastro', 'EmailController@cadastroForm')->name('enviar-cadastro');







