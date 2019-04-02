<?php 
namespace JanKlod\Database;


/**
 * @package JanKlod\Database\QueryRepository 
*/ 
class QueryRepository
{
        
        /**
         * select fields
         * @param mixed $parses 
         * @return string
        */
	    public static function select($parses)
	    {
	    	 if(!empty($parses))
	    	 {
	    	 	 $fields = '`'. implode('`,`', array_values($parses)) . '`';

	    	 }else{

	    	 	$fields = "*";
	    	 }

	    	 return sprintf('SELECT %s ', $fields);
	    }


        
        /**
         * Check if has table
         * @param string $table 
         * @return string
         */
	    public static function checkIfHasTable($table)
	    {
	    	   if(is_null($table))
               {
                   exit('Table name is required!');
               }
	    }

}