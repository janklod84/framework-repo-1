<?php 
namespace app\controllers;


use app\library\BootstrapForm;

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
    	     $this->form();
        }
        
        /**
         * Factory render form
         * @return string
        */
        private function form()
        {
             $form = new BootstrapForm($_POST);
             $title = 'Вход';
    	     $this->render('partials/form', compact('title', 'form'));
        }
}