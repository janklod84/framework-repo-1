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
           protected $pk = 'id';

    
    		   /**
    		    * @var DatabaseConnection 
    		   */
    	       protected $db;

           
           /**
            * data container
            * @var array
           */
           protected $data = [];


           /**
            * row count
            * @var int
           */
           protected $count; 

           
           /**
            * container results
            * @var array
           */
           protected $result;


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
            * Query with Where 
            * @param type $value 
            * @param type|string $table 
            * @param type|string $pk 
            * @return type
          */
           private function where($value, $table = '', $pk = '')
           {
               return $this->queryBuilder->select()
                                   ->from($table)
                                   ->where($pk, $value)
                                   ->sql();
           }

           
           /**
            * Get item like find but it special for detemine unique
            * @param type $table 
            * @param type $pk 
            * @param type $value 
            * @return type
           */
           public function get($table, $pk, $value)
           {
                $sql = $this->where($value, $table, $pk);
                return $this->db->query($sql, $this->queryBuilder->values);
           }


           /**
            * Find one record form table
            * @return type
           */
      		   public function find(int $pk)
      		   {
      			   	   try
      			   	   {
      			            $sql = $this->where($pk, $this->table, $this->pk);

      			            $stmt = $this->db->query($sql, $this->queryBuilder->values);
      			            
      			            $this->result = $stmt->fetch();

                        return $this->result;
                              
      			        } catch (PDOException $e) {

      			        	 exit($e->getMessage());
      			        }
      		   }



            /**
             * Pagination 
             * @param string $limit 
             * @return string
             */
            public function paginate($limit)
            {
                return $this->all($limit);
            }

        		   /**
        			   * fetch all tasks from database
        			   * @return bool
        	       */
        		   public function all($limit = null, $sort = null)
        		   {
        					try          
        					{
        				            if($limit)
        				            {
        				            	    $sql = $this->queryBuilder
        					                            ->select('*')
        					                            ->from($this->table)
                                              ->orderby($sort)
        					                            ->limit($limit)
        					                            ->sql();   

                                  // die($sql);

        				            }else{

                                     $sql = $this->queryBuilder
    				                                     ->select('*')
    				                                     ->from($this->table)
    				                                     ->sql();
        				            }
        		            
        						       $stmt = $this->db->query($sql);
        				       
        				            $this->result = $stmt->fetchAll();
        				            $this->count = $stmt->rowCount(); 

        					  } catch(\Exception $e) {

        					  	    exit($e->getMessage());
        					 }

        			     return $this;
        		  }


              /**
               * Get rows count
               * @return int
              */
              public function count()
              {
              	  return $this->count;
              }


              /**
                * Get result
                * @return mixed
              */
              public function results()
              {
              	  return $this->result;
              }




          		  /**
          	      * Create new task
          	      * @param array $data from form
          	      * @return mixed
                */
          		  public function create(array $data = [])
          		  {
                         $data = $data ?? $this->data;

          	            try
          	            {
          	            	 $sql = $this->queryBuilder
          	                        ->insert($this->table)
          	                        ->set($data)
          	                        ->sql();
                            
          	                 return $this->db->query($sql, $this->queryBuilder->values);

          	            } catch (\PDOException $e) {

          	            	exit($e->getMessage());
          	            }
          		  }


              /**
               * Update Task
               * @param int $id 
               * @return type
              */
          		  public function update(int $id, array $data = [])
          		  {
                        $data = $data ?? $this->data;

                        try 
                        {
                             $sql = $this->queryBuilder
          	                           ->update($this->table)
          	                           ->set($data)
          	                           ->where($this->pk, $id)
          	                           ->sql();

                             return $this->db->query($sql, $this->queryBuilder->values);

                        }catch(PDOException $e) {

                        	   exit($e->getMessage());
                        }
          		  }


              
              /**
               * Delete item from data
               * @param int $id 
               * @return bool
               */
          		  public function delete($id)
          		  {
                         try 
                         {
                                $sql = $this->queryBuilder
                                            ->delete()
          	                              ->from($this->table)
          	                              ->where($this->pk, $id)
          	                              ->sql();

                                return $this->db->query($sql, $this->queryBuilder->values);

                         }catch(PDOException $e){

                         	  exit($e->getMessage());
                         }
          		  }


              /**
               * Set data 
               * @param array $data 
               * @return void
              */
        		  public function setData(array $data)
        		  {
                        $this->data = $data;
        		  }
        	         
                  
             /**
               * Get table name
               * @return string
             */
      	     public function getTable()
      	     {
      	   	      return $this->table;
      	     }


}
