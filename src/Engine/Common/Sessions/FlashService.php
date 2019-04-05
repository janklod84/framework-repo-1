<?php 
namespace JanKlod\Common\Sessions;


/**
 * @package JanKlod\Common\Sessions\FlashService  
*/ 
class FlashService 
{
        
        /**
         * @var SessionInterface 
        */
        private $session;


        /**
         * @var array 
        */
        private $messages;


        /**
         * @var session key
        */ 
        private $sessionKey = 'flash';


        /**
         * Constructor
         * @param SessionInterface $session 
         * @return void
        */
        public function __construct(SessionInterface $session)
        {
                $this->session = $session;
        }

        
        /**
         * Set success flash
         * @param string $message 
         * @return void
         */
        public function success(string $message)
        {
	           $flash = $this->session->get($this->sessionKey, []);
	           $flash['success'] = $message;
	           $this->session->set($this->sessionKey, $flash);	
        }
        

        /**
         * Set errors flash
         * @param string $message 
         * @return void
         */
        public function error(string $message)
        {
	           $flash = $this->session->get($this->sessionKey, []);
	           $flash['error'] = $message;
	           $this->session->set($this->sessionKey, $flash);
        }

       
        /**
         * Get type message
         * @param string $type 
         * @return mixed
        */
        public function get(string $type): ?string
        {
	          if(is_null($this->messages))
	          {
	               $this->messages = $this->session->get($this->sessionKey, []);
	               $this->session->delete($this->sessionKey);

	          }
	      	 
	      	  if(array_key_exists($type, $this->messages))
	      	  {
	      	  	  return $this->messages[$type];
	      	  }

      	      return null;
      }
}