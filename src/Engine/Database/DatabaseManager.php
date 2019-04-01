<?php 
namespace JanKlod\Database;


/**
 * @package JanKlod\Database\DatabaseManager
*/
class DatabaseManager
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
		public function query(string $sql, $params = [])
        {
        	 if(!empty($params))
        	 {
        	 	 $stmt = $this->connection->prepare($sql);
        	 	 $stmt->execute($params);

        	 }else{

                 return $this->connection->query($sql);
        	 }
             
        }


        public function fetchAll($sql)
        {
        	 return $this->query($sql)->fetchAll();
        }
        
        /**
         * Prepare statement 
         * @param string $sql 
         * @return 
        */
        public function prepare(string $sql)
        {
             return $this->connection->prepare($sql);
        }

		
		/**
         * Begin transaction
         * @param string $sql 
         * @return ''
        */
		public function beginTransaction()
		{
			 return $this->connection->beginTransaction();
		}
		

		/**
		 * Roolback
		 * @return ''
		*/
		public function rollBack()
		{
			 return $this->connection->rollBack();
		}
		
		/**
		 * Commit
		 * @return ''
		*/
		public function commit()
		{
			 return $this->connection->commit();
		}
		
		
		/**
		 * 
		 * @param QueryStatement $stmt 
		 * @param array $params 
		 * @return ''
		*/
		public function execute(QueryStatement $stmt, $params = [])
		{
			return $stmt->execute($params);
		}

       
}