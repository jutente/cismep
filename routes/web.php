<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/relsetor', 'ReportController@index')->name('relsetor');

Route::get('/relatorio', 'RelatorioController@index')->name('relatorio');

Route::resource('/profissional', 'ProfissionalController');
Route::resource('/unidade', 'UnidadeController');
Route::resource('/setor', 'SetorController');
Route::resource('/parametro', 'ParametroController');
Route::resource('/pagamento', 'PagamentoController');
Route::resource('/competencia', 'CompetenciaController');
