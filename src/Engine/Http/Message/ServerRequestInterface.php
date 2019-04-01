<?php 
namespace JanKlod\Http\Message;


/**
 * @package JanKlod\Http\Message\ServerRequestInterface
*/
interface ServerRequestInterface
{
	   /**
         * Get server datas
         * @param string|null $key 
         * @return mixed
        */
	    public function fromGlobals($key = null);
}
