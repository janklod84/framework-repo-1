<?php 
namespace JanKlod\Database;


/**
 * @package JanKlod\Database\DatabaseManager
*/
class DatabaseManager  implements DatabaseInterface
{
        
        /**
         * @var DatabaseConnection
        */
        private $connection;

        
        /**
         * Constructor
         * @param ConnectionInterface $connection 
         * @return ConnectionInterface
        */
	    public function __construct(ConnectionInterface $connection)
	    {
	    	 if(!$this->connection)
	    	 {
	    	 	 $this->connection = $connection->make();
	    	 }
	    }



		/**
         * Query statement 
         * @param string $sql 
         * @return mixed
        */
		public function query(string $sql, $params = [], $fetchMode = PDO::FETCH_OBJ)
        {
        	 if(!empty($params))
        	 {
	        	 	 $stmt = $this->connection->prepare($sql);
	        	 	 $stmt->execute($params);

	        	 	 $result = $stmt->fetchAll();

	        	 	 if($result === false)
	        	 	 {
	        	 	 	  return [];
	        	 	 }

	        	 	 return $result;

        	 }else{

                 return $this->connection->query($sql);
        	 }
             
        }

        
        /**
         * Determine the last insert id in records
         * @return int
        */
        public function lastInsertId()
	    {
	        return $this->connection->lastInsertId();
	    }

		
		/**
         * Begin transaction
         * @param string $sql 
         * @return type
        */
		public function beginTransaction()
		{
			 return $this->connection->beginTransaction();
		}
		

		/**
		 * Roolback
		 * @return type
		*/
		public function rollBack()
		{
			 return $this->connection->rollBack();
		}
		
		/**
		 * Commit
		 * @return type
		*/
		public function commit()
		{
			 return $this->connection->commit();
		}
		
       
}