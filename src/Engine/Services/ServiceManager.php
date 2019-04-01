<?php 
namespace JanKlod\Services;


use JanKlod\Container\ContainerInterface;


/**
 * @package ServiceManager of Application
*/
class ServiceManager implements ServiceInterface
{
        
        /**
         * Allowed name services
         * @var array 
        */
        const KEY_MATCHED = ['alias', 'providers'];

        /**
         * 
         * @var JanKlod\Container\ContainerInterface
        */
        private $app;


        /**
         * @var object Collection
        */
        private $collection;

        
        /**
         * Stored name of service to apply
         * @var array
        */
        private $services = [];



        /**
         * Constructor
         * @param JanKlod\Container\ContainerInterface $app 
         * @return void
        */
        public function __construct(ContainerInterface $app)
        { 
                debug($this->app);
               $this->app = $app;
        }
  
        /**
         * Add service name
         * Show exemple in Bootstrap class
         * @param array $serviceData
         * @return void
        */
        public function add(array $services)
        {
              $this->services = $services;
              return $this;
        }

        
        /**
         * Initialize all services
         * @return type
         */
        public function load()
        {
            foreach($this->services as $service)
            {
                if($this->existObject($service))
                {
                     $serviceObj = new $service($this->app);
                 
                     if(!$this->matching($serviceObj))
                     {
                          exit(sprintf('Sorry, This service <strong>%s</strong>cannot running!', $serviceObj));
                     }
                     
                     //##  Initialize service
                     $serviceObj->init();
                    
                }
            }
        }


        /**
         * Determine if the current object has required to run
         * @param  $serviceObj 
         * @return type
        */
        private function matching($serviceObj)
        {
             return in_array($serviceObj->getName(), self::KEY_MATCHED);
        }

        /**
         * Determine if class exist
         * @param string $className
         * @return bool
        */
        private function existObject($className)
        {
             return class_exists($className);
        }
}