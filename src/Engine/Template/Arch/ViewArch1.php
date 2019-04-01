<?php 
namespace JanKlod\Template;

use Exception;


/**
 * @package JanKlod\Template\View
*/
class View implements ViewInterface
{
        

        const DEFAULT_LAYOUT = 'layout';

        /**
         * @var 
        */
        private $app;

        
        /**
         * @var ResponseInterface
        */
        private $response;

        
        /**
         * @var string layout
        */
        private $layout;


        /**
         * @var string viewPath
        */
        private $viewPath;

        
        /**
         * @var string errorPath
         */
        private $errorPath = 'app/views/errors/%s.php';

        
        /**
         * @var array
        */
        private $data = [];



        /**
         * @var ViewRepository
        */
        private $repository;


        /**
         * Constructor
         * @param Container $app 
         * @return void
        */
        public function __construct($app)
        {
             $this->app  = $app;
             $this->response = $this->app->response;
             $this->repository = new ViewRepository($this->app->file);
        } 

        
        
        /**
         * Set view path
         * @param string $viewPath 
         * @return void
        */
        public function setViewPath($viewPath)
        {
              $this->viewPath = $this->repository->to($viewPath);
        }


        /**
         * Get view path
         * @return string
        */
        public function getViewPath()
        {
             return $this->viewPath;
        }



        /**
         * Set layout path
         * @param string $layout 
         * @return void
        */
        public function setLayout($layout)
        {
            if($layout === false)
            {
                $this->layout = false;

            }else{

                $this->layout = $layout ?: self::DEFAULT_LAYOUT;
            }
            
        }


        /**
         * Get current layout path
         * @return string
        */
        public function getLayout()
        {
             return $this->layout;
        }

        
        /**
         * Set errors views
         * @param string $errorView 
         * @return string
        */
        public function setErrorPath($errorPath)
        {
             $this->errorPath = $errorPath;
        }

        
        /**
         * Get error path
         * @return string
        */
        public function getErrorPath()
        {
             return $this->errorPath;
        }



        /**
         * Set data
         * @param array $data
         * @return void
        */
        public function setData($data)
        {
             $this->data = $data;
        }


        /**
         * Get data
         * @return array
        */
        public function getData()
        {
             return $this->data;
        }

        
        /**
         * 
         * @param string $viewPath 
         * @param array $data 
         * @return ''
        */
        public function render($viewPath, $data = [])
        {      
               // debug($data, true);
               $this->setData($data);
               $this->setViewPath($viewPath);
               $this->buffer();
        }


        
        /**
         * Get Out put
         * @return void
         */
        public function buffer()
        {
               ob_start();
               extract($this->data);
               require_once($this->viewPath);
               $content = ob_get_clean();

               // To FIX Here When layout === false
               if($this->layout !== false)
               {
                   $layoutPath = $this->repository->to($this->layout);
                   require_once($layoutPath);
               }
        }

       
        /**
          * Get not found page with status
          * 
          * $this->app->view->setErrorPath(sprintf('app/views/errors/%s.php', $code);
          * @param int $code [Error code]
          * @return void
         */
         public function errorCode($code = 404)
         {
              $this->response->setCode($code);
              $path = sprintf($this->errorPath, $code);
              $this->app->file->call($path);
              exit;
         }
         
}