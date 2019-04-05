<?php 
namespace JanKlod\Database\Special;


/**
 * @package JanKlod\Database\ActiveRecord 
*/ 

class ActiveRecord 
{
          
           /**
            * Name of table
            * @var string
           */
           protected $table;

           
           /**
            * @var primary key
           */
           protected $pk;


		   /**
		    * @var DatabaseConnection 
		   */
	       protected $db;


		   /**
		    * @var QueryBuilder
		   */
		   protected $queryBuilder;


           /**
            * Constructor
            * @return string
           */
		   public function __construct()
		   {
		   	     $this->db = DB::getInstance();
                 $this->queryBuilder = new QueryBuilder();
		   }

           
           /**
            * Get table name
            * @return string
           */
		   public function getTable()
		   {
		   	   return $this->table;
		   }


           
           /**
            * Find one record form table
            * @return type
           */
		   public function find($pk = null)
		   {
	            $sql = $this->queryBuilder
	                           ->select()
	                           ->from($this->table)
	                           ->where($this->pk, $pk)
	                           ->sql();

	            $result = $this->db->query($sql, $this->queryBuilder->values);
	            return isset($result[0]) ?? null;
		   }
}
