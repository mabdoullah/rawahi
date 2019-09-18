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

    Route::middleware(['auth:agent,embassador'])->group(function () {
      Route::get("embassador/{id}/edit","EmbassadorController@edit")->name('embassador.edit');
      Route::put("embassador/{id}","EmbassadorController@update")->name('embassador.update');
    });
    //
    Route::middleware(['auth:agent'])->group(function () {
      Route::get("embassador/{id}","EmbassadorController@show")->name('embassador.show');
      Route::get("embassador","EmbassadorController@index")->name('embassador.index');
      Route::get("embassador/create","EmbassadorController@create")->name('embassador.create');
      Route::POST("embassador/store","EmbassadorController@store")->name('embassador.store');
      Route::DELETE("embassador/{id}","EmbassadorController@destroy")->name('embassador.destroy');


    });

    Route::middleware(['auth:partners,embassador'])->group(function () {
      Route::get("partners/{id}/edit","partnersController@edit")->name('partners.edit');
      Route::put("partners/{id}","partnersController@update")->name('partners.update');
    });

    Route::middleware(['auth:partners'])->group(function () {
        Route::get("partners/{id}","partnersController@show")->name('partners.show');
        Route::get("partners","partnersController@index")->name('partners.index');
        Route::get("partners/create","partnersController@create")->name('partners.create');
        Route::POST("partners/store","partnersController@store")->name('partners.store');
        Route::DELETE("partners/{id}","partnersController@destroy")->name('partners.destroy');

    });



});






Route::get("login","LoginCustomController@login");
Route::post("login","LoginCustomController@dologin");
Route::any('logout','LoginCustomController@logout');
Route::any('admin/logout','LoginCustomController@logout');
