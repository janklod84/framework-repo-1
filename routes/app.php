<?php 

/*
  |------------------------------------------------------------------
  |          REGISTRATION ALL ROUTES OF APPLICATION
  |------------------------------------------------------------------
*/


/*
  /------------------------------------------------------------------
  /               FRONT WHITE LISTS ROUTES
  /------------------------------------------------------------------
*/
# https ? http ://your-base-url/
Route::get('/', "TaskController@index");
Route::get('/page-:id', "TaskController@index")->with(':id', '([0-9]+)');
Route::get('/sort-by-:sort', "TaskController@index")->with(':sort', '[a-z\-0-9]+');


# https ? http ://your-base-url/task/create
Route::get('/task/add', "TaskController@add");
Route::post('/task/add', "TaskController@add");


# https ? http ://your-base-url/task/edit/1
# https ? http ://your-base-url/task//1
Route::get('/task/edit/:id', "TaskController@edit", 'task.show')->with(':id', '[0-9]+');
Route::post('/task/edit/:id', "TaskController@edit")->with(':id', '[0-9]+');


# https ? http ://your-base-url/task/delete/1
Route::get('/task/delete/:id', "TaskController@delete", 'task.remove')->with(':id', '[0-9]+');

/*
  /------------------------------------------------------------------
  /                ADMIN WHITE LISTS ROUTES
  /------------------------------------------------------------------
*/




# https ? http ://your-base-url/dashboard/enter
Route::get('/dashboard/enter', "admin\\UserController@login");
Route::post('/dashboard/enter', "admin\\UserController@login");


// Logout 
Route::get('/dashboard/logout', "TaskController@logout");


/*
 |------------------------------------------------------------------
 |                 NOT FOUND ROUTE / PAGE
 |------------------------------------------------------------------
*/

Route::get('/404', 'NotFoundController@index');
Route::notFound('/404');
