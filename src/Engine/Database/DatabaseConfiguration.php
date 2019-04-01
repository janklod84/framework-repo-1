<?php 
namespace JanKlod\Database;


use JanKlod\Collections\Collection;


/**
 * @package JanKlod\Database\DatabaseConfiguration
*/
class DatabaseConfiguration
{
        
        /**
         * @var array
        */
        private $config = [];

        
        /**
         * @var JanKlod\Common\Collection
        */
        private $collection;
        

        /**
         * Constructor
         * @param array $config 
         * @return void
        */
        public function __construct(array $config)
        {
              $this->collection = new Collection($config);
        }
        
        
        /**
         * 
         * @param string $key 
         * @return mixed
        */
        public function get($key)
        {
             return $this->collection->get($key) ?? null;
        }
}