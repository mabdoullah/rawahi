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
      Route::get('search-partner-list','PartnerController@searchpartner')->name('searchpartners');
      Route::GET("settings/password","ChangePasswordController@change")->name('settings.password');
      Route::POST("password/update","ChangePasswordController@update")->name('password.update');

  });

  Route::get('get-embassador-list','PartnerController@getembassadorList');
  Route::get('get-partner-list','PartnerController@getpartnerList')->name('getpartner');
  

  Route::get("login","AdminLoginCustomController@login");
  Route::post("login","AdminLoginCustomController@dologin");
  Route::any('logout','AdminLoginCustomController@logout');
});









