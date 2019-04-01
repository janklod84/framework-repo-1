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
        protected $data = [];



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
             $layoutPath = sprintf('layouts/%s', $this->layout);
             $this->viewObject->setLayout($this->basePathView($layoutPath));
 	         $this->viewObject->render($this->basePathView($viewPath), $data);
	    }



        /**
         * WILL BE IMPLEMENTED!
         * 
         * Set variables for view
         * @param array $data
         * @return void
        */
        protected function set($data)
        {
              $this->data = $data;
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
         * Builder full view path
         * @param string $path 
         * @return string
        */
        private function basePathView($path)
        {
            return sprintf(self::VIEW_PATH_MASK, $this->app->env, $path);
        }


}