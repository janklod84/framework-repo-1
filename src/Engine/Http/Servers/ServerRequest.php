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
             return $this->fromGlobals('SERVER_PROTOCOL');
        }


        public function port()
        {
             return $this->fromGlobals('SERVER_PORT'); 
        }



        public function documentRoot()
        {
             return $this->fromGlobals('DOCUMENT_ROOT'); 
        }
      

        /**
          * Get Server SCHEME
          * @return string
        */
        public function scheme()
        {
              return $this->fromGlobals('REQUEST_SCHEME');
        }


        /**
         * Get arguments in mode cli
         * @return array
        */
        public function cli($type = 'argv'): array
        {
            return $this->fromGlobals($type);
        }


         /**
         * Get request Uri
         * @return string
        */
        public function uri()
        {
            return $this->fromGlobals('REQUEST_URI');
        }


        /**
         * Get Request Method
         * @return string
        */
        public function method()
        {
            return $this->fromGlobals('REQUEST_METHOD');
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
        	 $ip = $this->fromGlobals('REMOTE_ADDR'); // [1]

        	 if($this->fromGlobals('HTTP_CLIENT_IP')) // [2]
        	 {
        	 	    $ip = $this->fromGlobals('HTTP_CLIENT_IP');

        	 }elseif($this->fromGlobals('HTTP_X_FORWARDED_FOR')){

        	 	    $ip = $this->fromGlobals('HTTP_X_FORWARDED_FOR');
        	 }

        	 return $ip;
        }

        /**
         * Get HTTP HOST
         * @return string
        */
        public function host(): string
        {
             return $this->fromGlobals('HTTP_HOST');
        }
        

        /**
         * Find 
         * @param type $key 
         * @return array
        */
        public function fromGlobals($key = null)
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