<?php 

/*
  |------------------------------------------------------------------
  |                APPLICATION LIST ROUTES
  |------------------------------------------------------------------
*/

# http://project.loc/
Route::get('/', "HomeController@index");

/*
Route::get('/', function () {

    echo Route::url('welcome');
    echo 'Welcome to my web site';
});
*/

/*
 |------------------------------------------------------------------
 |               ADMIN ROUTES
 |------------------------------------------------------------------
*/


// GET REQUESTS
# http://project.loc/admin/login
Route::get('/admin/login', "admin\\LoginController@index");

Route::post('/admin/login', "admin\\LoginController@index", 'login.show');




/*
 |------------------------------------------------------------------
 |               TESTING GROUPS ROUTES
 |------------------------------------------------------------------
*/

# groups by prefix
/*
$options = [
   'prefix' => 'test',
   'controller' => 'Test'
];

// 'test\\RegisterController@index'
Route::group($options,  function () {
    // To Test
    // echo ROOT.'/app/routes.php';
});
*/


// 
Route::get('/test/:slug-:id', function ($slug, $id) {
 
  // echo Route::url('test.show', ['slug' => 'jean', 'id' => 3]);
  echo $slug . '- ' . $id;

}, 'page.show')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)');;


echo '<a href="' . Route::url('page.show', ['slug' => 'mon-amin', 'id' => 3]) .'">Link</a>';
echo '<a href="' . Route::url('test/app', ['slug' => 'mon-amin', 'id' => 3]) .'">Link</a>';


Route::get('/test/admin/:id-:slug', function ($id, $slug) {

 echo Route::url('test.admin', ['id' => $id, 'slug' => $slug]);

}, 'test.admin')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)');;


/*
 |------------------------------------------------------------------
 |                 NOT FOUND ROUTE / PAGE
 |------------------------------------------------------------------
*/

Route::get('/404', 'NotFoundController@index');
Route::notFound('/404');
