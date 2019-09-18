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


// Route::get('/getcities/{id}','front\EmbssadorController@getcities')->name('getcities');

// Admin
Route::group(['prefix' => 'admin', 'namespace'=>'admin' ,'as'=>'admin.' ], function()
{
  Route::resource("home","HomeController");
  Route::resource("agent","AgentController");
  Route::resource("embassador","EmbassadorController");
  
});

Route::namespace('front')->group(function () {
    Route::resource("/","HomeController");

    Route::middleware(['auth:agent'])->group(function () {
        Route::resource("embassador","EmbassadorController");
    });


    Route::middleware(['auth:embassador'])->group(function () {
        Route::resource("partner" ,"PartnerController");
    });



});






Route::get("login","LoginCustomController@login");
Route::post("login","LoginCustomController@dologin");
Route::any('logout','LoginCustomController@logout');
Route::any('admin/logout','LoginCustomController@logout');
