<?php 
namespace app\controllers;

use \HTML;

/**
 * @package app\controllers\admin\LoginController
*/
class HomeController extends BaseController
{

        /**
         * render home / main page
         * @return void
        */
        public function index()
        {    
        	 HTML::setTitle('Главная');
             $this->render('home/index');
        }
      
}