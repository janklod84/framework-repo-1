<?php 
namespace JanKlod\Foundation;



/**
 * @package JanKlod\Foundation\ControlManager
 * Use Strategy Pattern
*/
class ControlManager
{
        /**
         * Return current control and capture it
         * @param ControlInterface $controllable 
         * @return mixed
        */
        public static function currently(ControlInterface $controllable)
        {
               return $controllable->capture();
        }  
}