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
  Route::resource("partners","PartnerController");


  Route::get("login","AdminLoginCustomController@login");
  Route::post("login","AdminLoginCustomController@dologin");
  Route::any('logout','AdminLoginCustomController@logout');


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
      Route::get("embassador/create","EmbassadorController@create")->name('embassador.create');
      Route::get("embassador/{id}","EmbassadorController@show")->name('embassador.show');
      Route::get("embassador","EmbassadorController@index")->name('embassador.index');
      Route::POST("embassador/store","EmbassadorController@store")->name('embassador.store');
      Route::DELETE("embassador/{id}","EmbassadorController@destroy")->name('embassador.destroy');
      // agent can update his Data
      Route::get("agent/{id}/edit","AgentController@edit")->name('agent.edit');
      Route::put("agent/{id}","AgentController@update")->name('agent.update');
    });
     //============================= pratner route =============================== //
    Route::middleware(['auth:partner,embassador'])->group(function () {
      Route::get("partners/{id}/edit","PartnerController@edit")->name('partners.edit');
      Route::put("partners/{id}","PartnerController@update")->name('partners.update');
    });

     Route::middleware(['auth:embassador'])->group(function () {
        Route::get("partners/create","PartnerController@create")->name('partners.create');
        Route::get("partners/{id}","PartnerController@show")->name('partners.show');
        Route::get("partners","PartnerController@index")->name('partners.index');
        Route::POST("partners/store","PartnerController@store")->name('partners.store');
        Route::DELETE("partners/{id}","PartnerController@destroy")->name('partners.destroy');

     });

      //=============================End pratner route =============================== //
      Route::middleware(['auth:agent,embassador,partner,user'])->group(function () {
        Route::GET("changepassword/index","ChangePasswordController@index")->name('password.index');
        Route::POST("changepassword/update","ChangePasswordController@update")->name('password.update');
      });
});






Route::get("login","LoginCustomController@login");
Route::post("login","LoginCustomController@dologin");
Route::any('logout','LoginCustomController@logout');


Route::get('user/verify/{token}', 'LoginCustomController@verifyUser');
