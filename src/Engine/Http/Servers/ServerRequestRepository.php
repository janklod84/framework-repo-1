<?php 
namespace JanKlod\Http\Servers;

use JanKlod\Http\Message\ServerRequestInterface;


/**
 * @package ServerRequestRepository 
*/
class ServerRequestRepository
{
       
        /**
         * @var 
        */
        public $server;
        

        /**
         * Constructor
         * @param ServerRequestInterface $server 
         * @return void
        */
        public function __construct(ServerRequestInterface $server)
        {
              $this->server = $server;
        }


        /**
          * Determine if HTTPS is setted
          * @return bool
        */
        public function isHttps(): bool
        {
             return $this->server->has('HTTPS') 
                    AND $this->server->fromGlobals('HTTPS') == 'on';
        }

        
        /**
         * Determine if method is Post
         * @return type
        */
        public function isPost(): bool
        {
            return $this->server->method() === 'POST';
        }


        /**
         * Determine if current method from method GET
         * @return type
        */
        public function isGet(): bool
        {
        	 return $this->server->method() === 'GET';
        }


        /**
         * Determine if method is Ajax
         * @return type
        */
        public function isAjax(): bool
        {
             return $this->hasAjax() && $this->hasAjaxEquality();
        }

 
        private function hasAjax()
        {
            return $this->server->fromGlobals('HTTP_X_REQUESTED_WITH') ?? false;
        }

        private function hasAjaxEquality()
        {
            return $this->server->fromGlobals('HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest';
        }
}