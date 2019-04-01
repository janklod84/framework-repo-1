<?php 
namespace JanKlod\Foundation\Controls;

use JanKlod\Foundation\Setting;
use JanKlod\Foundation\ControlInterface;


/**
 * @package JanKlod\Foundation\Controls\UserPhpVersion 
*/ 
class UserPhpVersion implements ControlInterface
{
      
        /**
         * Current user php version
         * @var string
        */
        private $currentVersion;

        
        /**
         * Constructor
         * @return void
        */
        public function __construct()
        {
              $this->currentVersion = phpversion(); // PHP_VERSION
        }

        /**
          * Capture user version Php
          * @return type
        */
	    public function capture()
	    {
	           if(!$this->isOk())
	           {    
                  exit(sprintf(
                      $this->format('php_min'), 
                      $this->currentVersion, 
                      Setting::APP_PHP_MIN
                  )); 
	           }
	           return true;
        }

       
        /**
         * Determine if php current user php version 
         * match version php used application
         * @return type
         */
        private function isOk()
        {
            return version_compare($this->currentVersion, Setting::APP_PHP_MIN, '>=');
        }


        /**
         * Return preformat message
         * @param string $key 
         * @return string
         */
        private function format($key)
        {
            $message = $this->messages()[$key];
            return is_array($message) ? implode($message) : $message;
        }

        /**
         * Return all messages to show
         * @return array
        */
        private function messages()
        {
             return [
                'php_min' => 'Sorry, your current version php is <strong>%s</strong> 
                              but application <strong> ' . ucfirst(Setting::APP_NAME) . '</strong>
                              use minimum version <strong>%s</strong>'
                 
             ];
        }

        
        /**
         * Message styling
         * @param string $content 
         * @return string
        */
        private function style(string $content, $style = []): string
        {   
            $s = implode(";", $style);
            return sprintf('<p style="%s">%s</p>', $s, $data);
        }
}