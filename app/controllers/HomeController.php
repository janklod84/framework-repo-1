<?php 
namespace app\controllers;


class HomeController extends AppController
{
       
       // protected $layout = 'archives/admin';
       // protected $layout = 'default';

       public function index()
       {
       	    /*
       	    echo $this->json([
               'jean' => 'Brown',
               'ali'  => 'Test'
       	    ]);
            */

       	    // $this->layout = false;

       	    // view('welcome');
       	    
       	    return $this->render('welcome');
       }


       public function welcome()
       {
       	   echo __METHOD__.'<br>';
       }
}