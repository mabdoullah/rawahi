<?php

Route::group(['prefix' => 'admin', 'namespace'=>'admin' ,'as'=>'admin.' ], function()
{
  Route::middleware(['auth:admin'])->group(function () {

      Route::get("settings/info","SettingController@edit")->name('settings.info' );
      Route::put("settings/info/update","SettingController@update")->name('settings.info.update');
      // Route::resource("settings","SettingController");

      Route::resource("/","HomeController");
      Route::resource("agent","AgentController");
      Route::resource("embassador","EmbassadorController");
      Route::resource("partners","PartnerController");

  });

  Route::get('get-embassador-list','PartnerController@getembassadorList');
  Route::get('get-partner-list','PartnerController@getpartnerList');

  Route::get("login","AdminLoginCustomController@login");
  Route::post("login","AdminLoginCustomController@dologin");
  Route::any('logout','AdminLoginCustomController@logout');
});










