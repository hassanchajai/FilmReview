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
    Route::get('/Posts/create',"App\Http\Controllers\PostsController@create")->name("Posts@create");
    Route::post('/Posts/store',"App\Http\Controllers\PostsController@store")->name("Posts@store");
});

Route::get('/',"App\Http\Controllers\PostsController@index")->name("Posts@index");

Route::get('/Posts/{id}/edit',"App\Http\Controllers\PostsController@edit")->name("Posts@edit");
Route::put('/Posts/{id}/update',"App\Http\Controllers\PostsController@update")->name("Posts@update");
Route::delete('/Posts/destroy',"App\Http\Controllers\PostsController@destroy")->name("Posts@destroy");
Route::get('/Posts/{id}',"App\Http\Controllers\PostsController@show")->name("Posts@show");
Route::get('/Posts/{id}/vote',"App\Http\Controllers\PostsController@vote")->name("Posts@vote");

Route::post('/comment/store',"App\Http\Controllers\CommentsController@store")->name("comments@store");

// Route::get("/categories","CategoryController@index");
// Route::resources("categories",);
Route::group(["prefix" => "categories",'namespace'=>'App\Http\Controllers',], function () {
    Route::get("/", "CategoryController@index")->name("categories@index");
    Route::post("/", "CategoryController@store")->name("categories@store");
    Route::put("/{category}", "CategoryController@update")->name("categories@update");
    Route::get("/{category}", "CategoryController@destroy")->name("categories@destroy");
});
Route::group(["prefix"=>"profile",'namespace'=>'App\Http\Controllers'],function(){
    Route::get("/","ProfileController@index")->name("profile.index");
    Route::post("/updateImage","ProfileController@updateImage")->name("profile.updateImage");
    Route::post("/updateName","ProfileController@updateName")->name("profile.updateName");
    Route::post("/updatePassword","ProfileController@updatePassword")->name("profile.updatePassword");
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
