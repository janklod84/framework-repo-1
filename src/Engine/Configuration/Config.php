<?php 
namespace JanKlod\Configuration;


use JanKlod\Collections\Collection;

/**
 * @package \JanKlod\Configuration\Config 
*/
class Config implements ConfigInterface
{
        
        
         const DEFAULT_CONFIG_PATH = 'app/config/%s.php';

         /**
          * @var array
         */
          private static $stored = [];

        
          /**
           * Collection object
           * @var \JanKlod\Collections\Collection
          */
          private static $collection;


         /**
          * Config constructor
          * @var string $file
          * @return type
         */
         public function __construct(array $data)
         {    
              self::$stored = $data;
              self::$collection = new Collection(self::$stored);

              // debug(self::$collection);
         }
         
         /**
          * Set configuration
          * @param mixed $key 
          * @param mixed $value 
          * @return void
         */
         public static function set($key, $value)
         {
              self::$collection->set($key, $value);
         }

         

         /**
          * Get conif by key
          * @param mixed $key 
          * @return mixed
         */
         public static function get($key)
         {
             return self::$collection->get($key);
         }

         /**
          * Ensure if has das in container stored
          * @param mixed $key 
          * @return bool
        */
         public static function has($key): bool
         {
             return ! self::$collection->isEmpty($key);
         }

         /**
           * append config data in container
           * @param mixed $data
           * @return void
         */
         public static function push($data)
         {
             self::$collection->push($data);
         }


         /**
          * Get All config stored in $stored
          * @return array
         */
         public static function all()
         {
              return self::$collection->all();
         }


         /**
          * Find Config item
          * @param string $group 
          * @param string $item 
          * @return string
        */
         public static function group($group = 'default')
         {
              return self::all()[$group] ?? [];
         }

         /**
          * Load config from file
          * @param type|string $group 
          * @return type
         */
         public static function file($group = 'app') {}


         /**
          * Retrieve config item
          * @param string $group 
          * @param mixed $item 
          * @return mixed
         */
         public static function retriveItem($group = 'default', $item = null)
         {
              return self::group($group)[$item] ?? null;
         }
}
