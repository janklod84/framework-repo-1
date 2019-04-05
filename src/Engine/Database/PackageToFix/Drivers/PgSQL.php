<?php 
namespace JanKlod\Database\Drivers;

use JanKlod\Database\Driver;


/**
 * @package JanKlod\Database\Drivers\PgSQL
*/
class PgSQL  extends  Driver
{
         
         /**
          * @var string
         */
         protected $name = 'pgsql';


	     /**
		  * Get Dsn
		  * @return type
		 */
	     public function getDsn(): string
	     {
             return $this->getName();
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