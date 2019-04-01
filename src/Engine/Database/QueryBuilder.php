<?php 
namespace JanKlod\Database;


/**
 * @package JanKlod\Database\QueryBuilder
 */
class QueryBuilder 
{
      
       /**
        * @var array
       */
       private $sql = [];

      
       /**
        * @var array
       */
       private $values = [];


       /**
        * Select 
        * @return type
       */
       public function select()
       {
       	    $this->sql['SELECT'] = func_get_args();
       	    return $this;
       }

       
}