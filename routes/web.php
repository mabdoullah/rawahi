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
Route::resource("/","front\HomeController");
Route::resource("embassador","front\EmbassadorController");
// Route::get('/getcities/{id}','front\EmbssadorController@getcities')->name('getcities');
// mohamed
Route::resource("partner","front\PartnerController");

// Admin
// Asmaa
Route::group(['prefix' => 'admin','namespace' =>'admin','as'=>'admin.' ], function()
{
  Route::resource("home","HomeController");
  Route::resource("agent","AgentController");

  Route::resource("embassador","EmbassadorController");
  // Route::get("search",'AgentController@search');



});
