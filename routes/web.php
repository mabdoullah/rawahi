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

Route::namespace('front')->group(function () {
    Route::resource("/","HomeController");

    Route::resource("embssador","EmbssadorController");
    Route::resource("partners" ,"PartnerController");



    Route::get("login","LoginCustomController@login");
    Route::post("login","LoginCustomController@dologin");
    Route::any('logout','LoginCustomController@logout');
    
});



// Admin
Route::group(['prefix' => 'admin'], function()
{
  Route::resource("home","admin\HomeController");
  Route::resource("agent","admin\AgentController");
  Route::any('logout','LoginCustomController@logout');
});


