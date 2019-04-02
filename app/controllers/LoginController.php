<?php 
namespace app\controllers;


use app\library\BootstrapForm;
use \HTML;


/**
 * @package app\controllers\admin\LoginController
*/
class LoginController extends AppController
{
        
        /**
         * Index
         * @return void
        */
        public function index()
        {    
             if($this->isPost())
             {
                 // die('POST');
             }
             
    	     $this->form();
        }
        
        /**
         * Factory render form
         * @return string
        */
        private function form()
        {
             $form = new BootstrapForm($_POST);
             HTML::setTitle('Вход');
    	     $this->render('partials/form', compact('form'));
        }
}