<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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


//-----------------------------------------------------------------------------------------------------------------------

/*
Metodos existentes de rotas
get
post
put
patch 
delete 
options
*/
//-----------------------------------------------------------------------------------------------------------------------
// Route::get($uri, $callback () {
//     // return view('welcome');
//     return 'Olá, seja bem vindo ao curso';
// });


// Route::get('/', function () {
//     // return view('welcome');
//     return 'Olá, seja bem vindo ao curso';
// });


// Route::get('/sobre-nos', function () {
//     // return view('welcome');
//     return 'Sobre nós';
// });


// Route::get('/contato', function () {
//     // return view('welcome');
//     return 'Contato';
// });

//-----------------------------------------------------------------------------------------------------------------------

// Passando parametros na rota
// Route::get('/contato/{nome}', function (string $nome_recebido) {
//     echo 'Estamos aqui: ' . $nome_recebido;
// });

//-----------------------------------------------------------------------------------------------------------------------

//Definindo um valor padrão de parametro, caso este parametro esteja vazio
//adicionar "?" ao lado do parametro e adicionar o valor padrao que se deseja na funcao de callback, como o exemplo categoria
//ATENCAO! Neste mesmo exemplo, se tentasse deixar o nome como opcional o laravel se perderia na execucao. 
// Route::get('/contato/{nome}/{categoria?}', function(string $nome_recebido, string $categoria_recebida = 'Mensagem não enviada'){
//     echo 'Estamos aqui: ' . $nome_recebido . ' ' . $categoria_recebida;
// });

//OBS: Nao e possivel tirar um parametro do meio da url o laravel se perde e da erro, os parametros que voce for passar como valor padrao devem ser
//descritos da direita para esquerda: 
//ex: url: http://localhost:8000/contato/Jorge/mensagem/
//Se voce apagar o campo mensagem, depois jorge os valores parametros seram implementados
//Se voce apagar campo nome ele dara erro 404 

//-----------------------------------------------------------------------------------------------------------------------

//Utilizando expressoes regulares pararegrar os parametros
// Route::get(
//     '/contato/{nome}/{categoria_id?}',
//     function (
//         string $nome_recebido,
//         int $categoria_id_recebida = 1 // 1 - Informacao
//     ) {
//             echo 'Estamos aqui: ' . $nome_recebido . ' ' . $categoria_id_recebida;
//     }
// )->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');//TRATANDO OS PARAMETROS 

//-----------------------------------------------------------------------------------------------------------------------

//Agrupamento de rotas e nomeacao, essa nomeacao so pode ser utilizada dentro na applicao na url permanece normal
//A nomeacao das rotas e interessante, pois caso haja alteracao do caminho da rota o nome permanece o mesmo e não precisa alterar nada
//Ex: se a rota "/contato" passa a ser "/formulario_contato" o nome da rota e site.contato entao nada sera afetado
// Route::prefix('/app')->group(function(){

//     Route::get('/clientes', function () {
//         return 'Clientes';
//     })->name('app.clientes');

//     Route::get('/fornecedores', function () {
//         return 'Fornecedores';
//     })->name('app.fornecedores');


//     Route::get('/produtos', function () {
//         return 'Produtos';
//     })->name('app.produtos');
// });

//-----------------------------------------------------------------------------------------------------------------------

// POSSIVEIS REDIRECT

//Redirecionamento de rotas, quando cair na rota2 sera redirecionado para a rota1
// Route::get('/rota01', function(){
//     echo 'Rota 1';
// })->name('site.rota01');

// Route::get('/rota02', function(){
//     echo 'Rota 2';
// })->name('site.rota02');

// 1 - Metodo Route (Passamos como parametro a rota origem e a rota destino)
// Route::redirect('rota02','rota01');

// 2 - Redirect sendo feito dentro da funcao de callback ou na action do controlador
// retornamos o metodo redirect e chamamos o metodo route passando o nome da rota como parametro
// Route::get('/rota02', function(){
//     return redirect()->route('site.rota01');
// })->name('site.rota02');

//-----------------------------------------------------------------------------------------------------------------------

// Criando uma rota de fallback, ou seja, uma rota que caso de erro em alguma das rotas ele e direcionado para essa rota personalizada
// Evitando o erro 404 de pagina not found

// Route::fallback(function(){
//     echo 'A rota acessada não existe! <a href="'. route('site.index') .'">Clique aqui </a> para ir para página inicial'; 
// });

//-----------------------------------------------------------------------------------------------------------------------

// Route::middleware(LogAcessoMiddleware::class)
//     ->get('/', 'PrincipalController@principal_action')
//     ->name('site.index');

/*
-----------------------------------------------------------------------------------------------
ENCADEANDO MIDDLEWARES

Route::middleware('log.acesso','autenticacao') //Chamando 2 middlewares aqui
        ->get('/clientes', function () {
            return 'Clientes';
        })->name('app.clientes');

-----------------------------------------------------------------------------------------------
*/
//Enviando parametros para os controladores
Route::get('/teste/{p1}/{p2}', 'TesteController@teste_action')->name('teste');
//-----------------------------------------------------------------------------------------------

Route::get('/', 'PrincipalController@principal_action')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'SobreNosController@sobre_nos_action')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato_action')->name('site.contato');

Route::post('/contato', 'ContatoController@salvar_action')->name('site.contato');

Route::get('/recebido', function () {
    return view('site.recebido-view');
})->name('site.recebido');


Route::get('/login/{erro?}', 'LoginController@index_action')->name('site.login');

Route::post('/login', 'LoginController@autenticar_action')->name('site.login');


//Agrupamento de rotas e nomeacao, essa nomeacao so pode ser utilizada dentro na applicao na url permanece normal
//A nomeacao das rotas e interessante, pois caso haja alteracao do caminho da rota o nome permanece o mesmo e não precisa alterar nada
//Ex: se a rota "/contato" passa a ser "/formulario_contato" o nome da rota e site.contato entao nada sera afetado

//O parametro 'padrao' do middleware, sera passado la na classe AutenticacaoMiddleware
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {

    Route::get('/home', 'HomeController@index_action')->name('app.home');

    Route::get('/sair', 'LoginController@sair_action')->name('app.sair');

    Route::get('/cliente', 'ClienteController@index_action')->name('app.cliente');

    Route::get('/fornecedor', 'FornecedorController@index_action')->name('app.fornecedor');

    Route::get('/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    Route::post('/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    Route::get('/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');

    //Setando id como parametro obrigatorio
    Route::get('/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');

    Route::get('/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //Rotas criadas com resources
    Route::resource('produto', 'ProdutoController');

    Route::resource('produto-detalhe', 'ProdutoDetalheController');
});

//ROTA PERSONALIZADA
Route::fallback(function () {
    echo 'A rota acessada não existe! <a href="' . route('site.index') . '">Clique aqui </a> para ir para página inicial';
});
