<?php 
namespace JanKlod\Http\Requests;


use JanKlod\Http\Servers\ServerRequest;


/**
 * @package Response
*/
class Response implements ResponseInterface
{
       
        /**
         * @var string
        */
        private $content;


        /**
         * @var int
        */
        private $status;


        /**
         * @var array
        */
        private $headers = [];

    

        /**
         * Response constructor
         * @param string $content 
         * @param string|int $status 
         * @param null|array $headers 
         * @return void
        */
        public function __construct($content = null, $status = 200, $headers = [])
        {
              $this->content  = $content;
              $this->status   = $status;
              $this->headers  = $headers;
        }

        
         /**
         * Set status
         * @param type $status 
         * @return void
        */
        public function setStatus($status)
        {
              $this->status = $status;
        }


        /**
         * Set output
         * @param string $content 
         * @return void
         */
        public function setBody($content)
        {
              $this->content = $content;
        }

        /**
         * Set Code Satus
         * @param type $status 
         * @return type
        */
        public function withBody($content)
        {
              $this->setBody($content);
              return $this;
        }

        
        /**
         * Set Code Satus
         * @param type $status 
         * @return type
        */
        public function withStatus($status)
        {
              $this->setStatus($status);
              return $this;
        }

        
        /**
         * Set Header to send browser
         * @param type $header 
         * @return type
        */
        public function withHeader($header)
        {
             $this->headers[] = $header;
             return $this;
        } 

        
        /**
         * Get data as format json
         * @param string $data 
         * @return string
        */
        public function asJson($data)
        {
        	 return json_encode($data);
        }

        
        /**
         * Redirect
         * @param type $to 
         * @return type
        */
        public function redirect($to = '/')
        {
             header(sprintf('Location: %s', $to));
             exit();
        }

        /**
          * set Protocol
          * @param type $protrocol 
          * @return type
        */
        public function getStatus()
        {
              return $this->status;
        }


        /**
          * Get headers setted
          * @return array
        */
        public function getHeaders(): array
        {
             return $this->headers;
        }

        
        /**
         * Get all headers from server
         * dynamically
         * @return type
        */
        public function parseHeaders(){}
       

        /**
         * Get content
         * @return type
        */
        public function getBody()
        {
            return $this->content;
        }
        
         
        /**
         * Method sent all headers to server
         * @return string
        */
        public function send()
        {
            $this->serverProtocol();
            $this->sendHeaders();
            $this->sendBody();
        }


        public function sendHeaders()
        {
            if(!empty($this->headers))
            {
                foreach($this->headers as $header)
                {
                    header($header);
                }
            }
        }

        
        /**
         * send body
         * @return string 
         */
        public function sendBody()
        {
            echo $this->content;
        }

        
        /**
         * Get http response code
         * @return void
        */
        public function setCode($code)
        {
             http_response_code($code);
        }
        
        
        /**
         * Get Protocol serveur with status
         * Show [HTTP 1.1 200] for exemple
         * @return void
        */
        private function serverProtocol()
        {
             if(!empty($this->status))
             {
                 $this->httpProtocol($this->status);
             }
        }

        /**
         * Set http protocol with status
         * @param int $status 
         * @return void
         */
        private function httpProtocol($status)
        {
             $head =  sprintf('%s %s', (new ServerRequest())->protocol(), $status);
             header($head);
             $this->setCode($status);
        }
}

