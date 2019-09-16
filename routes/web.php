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

// Asmaa


// Route::get('/getcities/{id}','front\EmbssadorController@getcities')->name('getcities');
// mohamed

Route::namespace('front')->group(function () {
    Route::resource("/","HomeController");

    Route::resource("embssador","EmbssadorController");
    Route::resource("partner" ,"PartnerController");
    
    Route::get("login","LoginCustomController@login");
    Route::post("login","LoginCustomController@dologin");
    Route::any('logout','LoginCustomController@logout');
    Route::any('admin/logout','LoginCustomController@logout');
});



