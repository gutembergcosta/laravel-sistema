<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/artigos', 'ApiVueController@lista');
Route::get('/artigo/{action}/{id?}', 'ApiVueController@getItem');
Route::post('/artigo/salvar', 'ApiVueController@salvar');
//Route::get('/files', 'ApiVueController@files');
//Route::post('/upload', 'ApiVueController@uploadApi');
Route::post('/upload', 'ArquivoController@uploadApi');
Route::post('/uploadDropZone', 'ArquivoController@uploadDropZone');

