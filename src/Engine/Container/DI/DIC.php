<?php 
namespace JanKlod\Container\DI;

use Closure;
use ReflectionClass;
use JanKlod\Container\ContainerInterface;


/**
 * Dependency Injection Container
 * @package JanKlod\Container\DI\DIC
*/
class DIC implements ContainerInterface
{


        /**
          * Container des enregistrements
          * @var array
        */
        private $container = [];
		
		
		   /**
         * Singletons
         * @var array
        */
        private $singletons = [];


        /**
         * Instances 
         * @var array
        */
        private $instances = [];



       /**
        * @param array $container
       */
       public function __construct(array $container = [])
       {
            $this->container = array_merge($this->container, $container);
       }


	      /**
          * Set key in container 
          * @param string $key
          * @param $resolver
        */
        public function set($key, $resolver)
        {
             $this->container[$key] = $resolver;
        }
        
        /**
         * Singleton
         * @param type $key 
         * @param type $resolver 
         * @return type
        */
        public function singleton($key, $resolver)
        {
              $this->singletons[$key] = $resolver;
        }


        /**
          * Create new object
          * @param type $name 
          * @return type
        */
        public function make(string $name)
        {
            return $this->createNewObject($name);
        }


        /**
         * Merge data in container
         * @param array $data 
         * @return void
         */
        public function merge(array $data = [])
        {
            $this->container = array_merge($this->container, $data);
        }


        /**
         * Push data in container
         * @param array $data 
         * @return void
        */
        public function push(array $data)
        {
            array_push($this->container, $data);
        }


        /**
          * @param string $key
          * @return mixed
	      */
        public function get($key)
        {
      			// GET ITEM FROM CONTAINER
      			if(isset($this->container[$key]))
      			{
      				  return $this->call($this->container[$key]);
      			}
      			
            
                // GET SINGLETONS
                 if(!isset($this->instances[$key]))
                 {
                        $this->instances[$key] = $this->getSingleton($key);
                 }

                 return $this->instances[$key];
        }

        
        /**
         * Call instance singleton
         * @param string $key 
         * @return mixed
        */
        private function getSingleton($key)
        {
             if(isset($this->singletons[$key]))
             {
                 return $this->call($this->singletons[$key]);
             }
        }

       
        /**
         * Call shared item directy by key name
         * Exemple : $this->{$key} if isset this key [$this->app->{$key}]
         * 
         * @param string $key 
         * @return mixed
        */
        public function __get($key)
        {
             return $this->get($key);
        }

        
        /**
         * Call container
         * @param type $container 
         * @return type
        */
        private function call($container)
        {
              if($container instanceof \Closure)
              {
                  return $container($this);
              }
            
              return $container;
        }


        /**
         * Create new object if class exist
         * This method will be extended !
         * 
         * @param string $objName 
		 * @param $params constructor params
         * @return object
        */
        private function createNewObject($objName): object
        {
             if(!class_exists($objName))
             {
                die($objName ." does'nt exist");
             }
             $reflectedClass = new ReflectionClass($objName);
             $instance = $reflectedClass->getName();
             $this->instances[$instance] = new $instance; 
             return $this->instances[$instance];
        }

        
        // for my self to show containers
        public function printOut()
        {
            if(DEV)
            {
                echo '<h2>Container</h2>';
                debug($this->container);

                echo '<h2>Singletons</h2>';
                debug($this->singletons);

                echo '<h2>Instances</h2>';
                debug($this->instances);
            }
        }


        
}