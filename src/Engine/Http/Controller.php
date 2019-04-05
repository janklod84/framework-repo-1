<?php 
namespace JanKlod\Http;



/**
 * @package Controller
*/
abstract class Controller 
{
        
       
        const VIEW_PATH_MASK = '%s/views/%s.php';

        /**
         * @var ContainerInterface
        */
        protected $app;

        
        /**
         * @var RequestInterface
        */
        protected $request;

        
        /**
         * Layout 
         * @var string
        */
        protected $layout = 'default';


        /**
         * View Path
         * @var string
        */
        protected $view;



        /**
         * Data will be parse to view
         * @var array
        */
        // protected $data = [];



        /**
         * Constructor
         * @param ContainerInterface $app 
         * @return void
        */
	    public function __construct($app)
	    {
	    	  $this->app        =  $app;
              $this->viewObject =  $app->view;
              $this->request    =  $app->request;
	    }

        

        /**
         * Get View
         * @return mixed
         */
	    protected function render($viewPath, $data = [])
	    {     
             $viewPath = trim($viewPath, '/');
             $layoutPath = sprintf('layouts/%s', $this->layout);
             $this->viewObject->setLayout($this->basePathView($layoutPath));
 	         $this->viewObject->render($this->basePathView($viewPath), $data);
	    }

        
        /**
         * Show errors
         * @param int $code 
         * @return mixed
        */
        public function errorCode($code = 404)
        {
             return $this->viewObject->errorCode();
        }

        /**
         * LATER IT's WILL BE IMPLEMENTED CORRECTY!
         * 
         * Set variables for view
         * @param array $data
         * @return void
        */
        // protected function set($data)
        // {
              // $this->data = $data;
        // }

        /**
         * Redirect to page with header Location
         * @param strin $to [path to redirect] Ex: [ $this->redirect('/users/')]
         * @return type
        */
        protected function redirect($to = '')
        {
              return response()->redirect($to);
        }

        
        /**
         * Determine if method is Get Request
         * @return type
        */
        protected function isGet()
        {
        	return $this->request->isGet();
        }


        /**
         * Determine if method is Post request
         * @return type
        */
        protected function isPost()
        {
        	return $this->request->isPost();
        }



        /**
         * Determine if method is Ajax request
         * @return type
        */
        protected function isAjax()
        {
        	return $this->request->isAjax();
        }


        /**
         * Get data as Json
         * @param string $content 
         * @return string
        */
        protected function json($data)
        {
            return json_encode($data);
        }

        
        /**
         * Find data from post request
         * @param string $key 
         * @return mixed
        */
        protected function post($key = null)
        {
            return $this->request->post($key);
        }


        /**
         * Find data from get request
         * @param string $key 
         * @return mixed
        */
        protected function get($key = null)
        {
            return $this->request->get($key);
        }

        
        /**
         * Builder full view path
         * @param string $path 
         * @return string
        */
        private function basePathView($path)
        {
            return sprintf(self::VIEW_PATH_MASK, $this->app->env, $path);
        }


}