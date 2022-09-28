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
Route::get('/create', 'CarsController@save')->name('cars.create'); 
Route::post('/store', 'CarsController@store')->name('cars.store'); 

//owner routs
Route::get('/owners', 'OwnersController@index')->name('owners.index'); 
Route::get('/owners/create', 'OwnersController@create')->name('owners.create'); 
Route::post('/owners/store', 'OwnersController@store')->name('owners.store'); 
Route::get("/owners/{id}/edit", "OwnersController@edit")->name('owners.edit');
Route::post("/owners/{id}/update", "OwnersController@update")->name('owners.update');
Route::post('/owners/{id}/delete', 'OwnersController@destroy')->name('owners.delete');