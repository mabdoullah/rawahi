<?php

Route::namespace('front')->group(function () {
    Route::resource("/","HomeController");

    
    Route::middleware(['auth:agent,embassador'])->group(function () {
      // agent and embassador can edit and update embassador data
      Route::get("embassador/{id}/edit","EmbassadorController@edit")->name('embassador.edit');
      Route::put("embassador/{id}","EmbassadorController@update")->name('embassador.update');
    });
    //
    Route::middleware(['auth:agent'])->group(function () {

      Route::middleware(['isEmailVerified'])->group(function () {
        // agent permission for embassadors
        Route::get("embassador/create","EmbassadorController@create")->name('embassador.create');
        Route::get("embassador/{id}","EmbassadorController@show")->name('embassador.show');
        Route::get("embassador","EmbassadorController@index")->name('embassador.index');
        Route::POST("embassador/store","EmbassadorController@store")->name('embassador.store');
        Route::DELETE("embassador/{id}","EmbassadorController@destroy")->name('embassador.destroy');
      });

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
        
        Route::middleware(['isEmailVerified'])->group(function () {
          Route::get("partners/create","PartnerController@create")->name('partners.create');
          Route::get("partners/{id}","PartnerController@show")->name('partners.show');
          Route::get("partners","PartnerController@index")->name('partners.index');
          Route::POST("partners/store","PartnerController@store")->name('partners.store');
          Route::DELETE("partners/{id}","PartnerController@destroy")->name('partners.destroy');
        });

     });

      //=============================End pratner route =============================== //
      Route::middleware(['auth:agent,embassador,partner,user'])->group(function () {
        Route::GET("password/change","ChangePasswordController@change")->name('password.change');
        Route::POST("password/update","ChangePasswordController@update")->name('password.update');
      });

      //============================= Login =============================== //
      Route::get("login","LoginCustomController@login");
      Route::post("login","LoginCustomController@dologin");
      Route::any('logout','LoginCustomController@logout');


      Route::get('user/verify/{token}', 'VerifyCustomController@verifyUser');
      Route::get('email-not-verified','VerifyCustomController@emailNotVerified');


      Route::get('test', 'LoginCustomController@test');

});










