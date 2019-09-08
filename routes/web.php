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
    return view('layout_desgin.index');
})->name('home');;
Route::get('partner/add', function () {
    return view('layout_desgin.add-listing');
})->name('partner');
// Route::get('embssador/register', function () {
//     return view('layout_desgin.registration-form');
// })->name('embssador.register');

Route::get('embssador/register','EmbssadorController@create')->name('embssador.register');

// Asmaa
Route::POST('embssador/store','EmbssadorController@store')->name('embssador.store');
Route::get('/getcities/{id}','EmbssadorController@getcities')->name('getcities');


// Route::get('home', function () {
//     return view('layout_desgin.index');
// });

// Auth::routes();
//
// Route::get('/', 'HomeController@index')->name('home');
