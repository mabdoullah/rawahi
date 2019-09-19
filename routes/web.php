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
      // agent and embassador can edit and update embassador data
      Route::get("embassador/{id}/edit","EmbassadorController@edit")->name('embassador.edit');
      Route::put("embassador/{id}","EmbassadorController@update")->name('embassador.update');
    });
    //
    Route::middleware(['auth:agent'])->group(function () {
      // agent permission for embassadors
      Route::get("embassador/{id}","EmbassadorController@show")->name('embassador.show');
      Route::get("embassador","EmbassadorController@index")->name('embassador.index');
      Route::get("embassador/create","EmbassadorController@create")->name('embassador.create');
      Route::POST("embassador/store","EmbassadorController@store")->name('embassador.store');
      Route::DELETE("embassador/{id}","EmbassadorController@destroy")->name('embassador.destroy');
      // agent can update his Data
      Route::get("agent/{id}/edit","AgentController@edit")->name('agent.edit');
      Route::put("agent/{id}","AgentController@update")->name('agent.update');
    });
    Route::middleware(['auth:embassador'])->group(function () {
        Route::resource("partners" ,"PartnerController");
    });

});






Route::get("login","LoginCustomController@login");
Route::post("login","LoginCustomController@dologin");
Route::any('logout','LoginCustomController@logout');
Route::any('admin/logout','LoginCustomController@logout');
