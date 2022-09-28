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

//cars db routs
Route::get('/cars', 'CarsController@index')->name('cars.index'); 
Route::get("/cars/{id}", "CarsController@show")->name('cars.show');
Route::get("/cars/{id}/edit", "CarsController@edit")->name('cars.edit');
Route::post("/cars/{id}/update", "CarsController@update")->name('cars.update');
Route::post('/cars/{id}/delete', 'CarsController@destroy')->name('cars.delete');
Route::get('/create', 'CarsController@save')->name('cars.create')->middleware('role'); 
Route::post('/store', 'CarsController@store')->name('cars.store'); 