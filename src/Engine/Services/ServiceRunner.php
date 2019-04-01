<?php 
namespace JanKlod\Services;

use JanKlod\Container\ContainerInterface;
use JanKlod\Foundation\Setting;


/**
 * @package JanKlod\Foundation\ServiceRunner 
*/
abstract class ServiceRunner 
{
         
         /**
          * Service Name
          * @var string
         */
         protected $name;


         /**
          * Config data
          * @var array
         */
         protected $config;

         
         /**
          * @var JanKlod\Container\ContainerInterface
         */
         protected $app;

         
         /**
          * Constructor
          * @param array $config 
          * @return void
         */
         public function __construct(ContainerInterface $app)
         {
                $this->app    = $app;
                $this->config = Setting::APP_SERVICES;
         }

         /**
          * Get config datas
          * @return array 
         */
         protected function getConfig()
         {
         	     return $this->config[$this->name];
         }


         /**
          * Get Name of service
          * @return type
         */
         public function getName()
         {
         	 return $this->name;
         }

         /**
          * Initialize service
          * @return type
         */
         abstract public function init();

}