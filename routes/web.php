<?php

use App\Http\Controllers\QuestionController;
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

Route::get('/admin/listquestion', 'QuestionController@index');
Route::get('/', ['as' => 'index', 'uses' => 'QuestionController@index']);

Route::get('/addQuestion', ['as' => 'createQuestion', 'uses' => 'QuestionController@addQuestion']);



Route::post('', ['as' => 'insertQuestion', 'uses' => 'QuestionController@insertQuestion']);
Route::get('detailQuestion/{questionid}', ['as' => 'detailQuestion', 'uses' => 'QuestionController@getDetailQuestion']);





Route::put('update-question/{questionid}', [QuestionController::class, 'update']);

Route::get('editQuestion/{questionid}', ['as' => 'editQuestion', 'uses' => 'QuestionController@editQuestion']);