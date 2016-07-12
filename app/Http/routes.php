<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/questions', 'QuestionController@store');
Route::get('/questions', ['uses' => 'QuestionController@index', 'as' => 'questions.index']);
Route::get('/questions/{id}/reply', ['uses' => 'QuestionController@reply', 'as' => 'questions.reply']);
Route::post('/questions/{id}/reply', ['uses' => 'QuestionController@replyStore', 'as' => 'questions.replyStore']);
