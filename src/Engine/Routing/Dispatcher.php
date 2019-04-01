<?php 
namespace JanKlod\Routing;



/**
 * @package JanKlod\Routing\Modules\Dispatcher;
*/
class Dispatcher 
{
	    

  	      /**
  	       * @var \Closure
  	      */
  	      private $callback;



          /**
           * @var ContainerInterface
          */
	        private $app;


          /**
           * @var current controller
          */
	       private $controller = '\\%s\\controllers\\%s';

        
          /**
           * @var current action
          */
	       private $action = 'index';

           
         /**
          * @var array
         */
	       private $matches = [];




        
         /**
          * Constructor
          * @param mixed $callback 
          * @param array $matches
          * @param ContainerInterface $app
          * @return mixed
         */
	      public function __construct($callback, $matches, $app)
	      {
          
                $this->callback = $callback;
                $this->matches  = $matches;
                $this->app = $app;

                if(is_string($this->callback))
                {
                	  list($controller, $action) = explode("@", $this->callback, 2);
                	  $this->controller = $this->getController($controller);
                	  $this->action = $this->getAction($action);
                	  $this->callback = [$this->controller, $this->action];
                }
	      }

       
       /**
         * Get callback with params
         * @return type
       */ 
       public function call()
       {
            if(is_callable($this->callback))
            {
                 return call_user_func_array($this->callback, $this->matches);
            }
       }
          
        /**
         * Determine name of controller
         * @param string $name 
         * @return string
        */
	      public function getController($name): object
	      {
	      	   $controller = sprintf($this->controller, $this->app->env, $name);

	      	   if(!class_exists($controller))
	      	   {
                    $message = sprintf('class <strong>%s</strong> does not exist', $name);
                    throw new \Exception($message);
                    
	      	   }
               
            return new $controller($this->app);
	      }
 
          
          /**
           * Determine name of action
           * @param string $name 
           * @return string
           */
          public function getAction($name): string
          {
          	   return $name ?? $this->action;
          }
}