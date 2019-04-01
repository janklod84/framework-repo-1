<?php 
namespace JanKlod\Database;


/**
 * @package JanKlod\Database\ConnectionInterface 
*/ 
interface ConnectionInterface 
{
      
      /**
       * Make Connection
       * @return mixed
      */
	  public function make();
}