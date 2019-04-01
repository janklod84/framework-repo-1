<?php 
namespace JanKlod\Http\Servers;


use JanKlod\Http\Message\ServerRequestInterface;
use JanKlod\Http\Collections\GlobalFactory;


/**
 * @package JanKlod\Http\Requests\ServerRequest 
*/ 
class ServerRequest implements ServerRequestInterface
{

       /**
        * @var array 
       */
       private $collection = [];

       
       /**
        * Constructor
        * @param ServerRequestInterface $server 
        * @return void
       */
       public function __construct()
       {
            $this->collection = (new GlobalFactory())->retrieve('server');
       }

        
        /**
         * Get Protocol server
         * @return type
        */
        public function protocol()
        {
             return $this->server('SERVER_PROTOCOL');
        }


        public function port()
        {
             return $this->server('SERVER_PORT'); 
        }



        public function documentRoot()
        {
             return $this->server('DOCUMENT_ROOT'); 
        }
      

        /**
          * Get Server SCHEME
          * @return string
        */
        public function scheme()
        {
              return $this->server('REQUEST_SCHEME');
        }


        /**
         * Get arguments in mode cli
         * @return array
        */
        public function cli($type = 'argv'): array
        {
            return $this->server($type);
        }


         /**
         * Get request Uri
         * @return string
        */
        public function uri()
        {
            return $this->server('REQUEST_URI');
        }


        /**
         * Get Request Method
         * @return string
        */
        public function method()
        {
            return $this->server('REQUEST_METHOD');
        }

        
        /**
         * Get User ip
         * Get the direct ip for user [1]
         * Get if user uses proxy     [2]
         * Get the direct ip for user [1]
         * @return string
        */
        public function ip()
        {
        	 $ip = $this->server('REMOTE_ADDR'); // [1]

        	 if($this->server('HTTP_CLIENT_IP')) // [2]
        	 {
        	 	    $ip = $this->server('HTTP_CLIENT_IP');

        	 }elseif($this->server('HTTP_X_FORWARDED_FOR')){

        	 	    $ip = $this->server('HTTP_X_FORWARDED_FOR');
        	 }

        	 return $ip;
        }

        /**
         * Get HTTP HOST
         * @return string
        */
        public function host(): string
        {
             return $this->server('HTTP_HOST');
        }
        

        /**
         * Find 
         * @param type $key 
         * @return array
        */
        public function server($key = null)
        {
            if(is_null($key))
            {
                return $this->collection->all();
            }
            
            return $this->has($key) ? $this->collection->get($key) : [];
        }

        /**
          * Determine if key exist in $_SERVER
          * @param string $key
          * @return bool
        */
        public function has($key): bool
        {
             return $this->collection->has($key);
        }

}