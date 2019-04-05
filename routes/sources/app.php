<?php 

/*
  |------------------------------------------------------------------
  |                APPLICATION LIST ROUTES
  |------------------------------------------------------------------
*/

# https ? http ://your-base-url/
Route::get('/', "HomeController@index");


# https ? http ://your-base-url/login
Route::get('/login', "LoginController@index");
Route::post('/login', "LoginController@send");


# https ? http ://your-base-url/admin/task ...
Route::get('/admin/task', "admin\\TaskController@index", 'task.show');
Route::post('/admin/task-1', "admin\\TaskController@create", 'task.create');
Route::post('/admin/task-2', "admin\\TaskController@read", 'task.edit');
Route::post('/admin/task-3', "admin\\TaskController@update", 'task.update');
Route::post('/admin/task-4', "admin\\TaskController@delete", 'task.delete');



# https ? http ://your-base-url/logout
Route::post('/logout', "admin\\AdminController@logout");


/*
 |------------------------------------------------------------------
 |                 NOT FOUND ROUTE / PAGE
 |------------------------------------------------------------------
*/

Route::get('/404', 'NotFoundController@index');
Route::notFound('/404');
