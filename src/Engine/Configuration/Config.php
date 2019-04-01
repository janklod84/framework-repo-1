<?php 
namespace JanKlod\Configuration;


use JanKlod\Collections\Collection;

/**
 * @package \JanKlod\Configuration\Config 
*/
class Config implements ConfigInterface
{
        

         /**
          * @var array
         */
          private static $stored = [];

        
          /**
           * Collection object
           * @var \JanKlod\Collections\Collection
          */
          private $collection;


         /**
          * Config constructor
          * @var string $file
          * @return type
         */
         public function __construct(array $data)
         {    
              self::$stored = $data;
              $this->collection = new Collection(self::$stored);

              // debug($this->collection);
         }
         
         /**
          * Set configuration
          * @param mixed $key 
          * @param mixed $value 
          * @return void
         */
         public function set($key, $value)
         {
              $this->collection->set($key, $value);
         }

         

         /**
          * Get conif by key
          * @param mixed $key 
          * @return mixed
         */
         public function get($key)
         {
             return $this->collection->get($key);
         }

         /**
          * Ensure if has das in container stored
          * @param mixed $key 
          * @return bool
        */
         public function has($key): bool
         {
             return ! $this->collection->isEmpty($key);
         }

         /**
           * append config data in container
           * @param mixed $data
           * @return void
         */
         public function push($data)
         {
             $this->collection->push($data);
         }


         /**
          * Get All config stored in $stored
          * @return array
         */
         public function all()
         {
              return $this->collection->all();
         }


         /**
          * Find Config item
          * @param string $group 
          * @param string $item 
          * @return string
        */
         public function group($group = 'default')
         {
              return $this->all()[$group] ?? [];
         }

         
         /**
          * Retrieve config item
          * @param string $group 
          * @param mixed $item 
          * @return mixed
         */
         public function retriveItem($group = 'default', $item = null)
         {
              return $this->group($group)[$item] ?? null;
         }
}
