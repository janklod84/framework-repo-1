<?php 

/*
  |------------------------------------------------------------------
  |                APPLICATION LIST ROUTES
  |------------------------------------------------------------------
*/

# http://project.loc/
Route::get('/', "LoginController@index");
Route::post('/', "LoginController@index");



/*
 |------------------------------------------------------------------
 |                 NOT FOUND ROUTE / PAGE
 |------------------------------------------------------------------
*/

Route::get('/404', 'NotFoundController@index');
Route::notFound('/404');
