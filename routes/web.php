<?php

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

Route::middleware(["admin"])->group(function(){
    Route::get('/films/create',"App\Http\Controllers\FilmsController@create")->name("films@create");
    Route::post('/films/store',"App\Http\Controllers\FilmsController@store")->name("films@store");
});

Route::get('/',"App\Http\Controllers\FilmsController@index");

Route::get('/films/{id}/edit',"App\Http\Controllers\FilmsController@edit")->name("films@edit");
Route::put('/films/{id}/update',"App\Http\Controllers\FilmsController@update")->name("films@update");
Route::delete('/films/destroy',"App\Http\Controllers\FilmsController@destroy")->name("films@destroy");
Route::get('/films/{id}',"App\Http\Controllers\FilmsController@show")->name("films@show");

Route::post('/comment/store',"App\Http\Controllers\CommentsController@store")->name("comments@store");


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
