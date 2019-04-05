<?php 
namespace JanKlod\Collections;


/**
 * This Basic classe help we to work with Array
 * @package JanKlod\Common\Collection
*/
class Collection implements CollectionInterface
{
      
        /**
         * @var array
        */
        private $items;

        
        /**
         * Constructor
         * @param array $items 
         * @return type
        */
        public function __construct(array $items = [])
        {
        	 $this->items = $items;
        }

        
        /**
         * Get collection self with params
         * @param array|array $items 
         * @return type
        */
        public function asObject(array $items)
        {
            $this->items = $items;
            return new self($items);
        }


        /**
         * Set collection items 
         * @param array $items 
         * @return type
        */
        public function setItems(array $items)
        {
              $this->items = $items;
              return $this;
        }

        /**
         * Set item by key
         * @param mixed $key
         * @param mixed $value
         * @return void
        */
        public function set($key, $value)
        {
             $this->items[$key] = $value;
        }
		
		

        /**
         * Get item by key
         * @param $key
         * @return mixed|null
        */
        public function get($key)
        {
             return $this->items[$key] ?? null;
        }

        /**
         * Determine wether key isset in container items
         * @param string $key
         * @return bool
        */
        public function has($key)
        {
            return isset($this->items[$key]);
        }


        /**
         * Determine if current key has value
         * @param mixed $key
        */
        public function isEmpty($key)
        {
            return empty($this->items[$key]);
        }

        
        /**
         * Determine if key exist in items collections
         * @param mixed $key 
         * @return type
         */
        public function ensuredKey($key)
        {
             return array_key_exists($key, $this->items);
        }


        
        /**
         * Get all items collection
         * 
        */
        public function all()
        {
            return $this->items;
        }

        /**
         * Push data in current items
         * @param array $items 
         * @return type
        */
        public function push($items)
        {
             array_push($this->items, $items);
        }


        /**
         * Remove item by key
         * 
         * @param string $key 
         * @return void
         */
        public function remove($key)
        {
             if($this->has($key))
             {
                  unset($this->items[$key]);
             }
        }

}