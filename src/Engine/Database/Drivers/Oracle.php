<?php 
namespace JanKlod\Database\Drivers;

use JanKlod\Database\Driver;


/**
 * @package JanKlod\Database\Drivers\Oracle
*/
class Oracle  extends  Driver
{
         
         /**
          * @var string
         */
         protected $name = 'oracle';


	     /**
		  * Get Dsn
		  * @return type
		 */
	     public function getDsn(): string
	     {
             return '';
	     }

         /**
          * Get driver nae
          * @return string
         */
	     public function getName(): string
	     {
             return $this->name;
	     }

}