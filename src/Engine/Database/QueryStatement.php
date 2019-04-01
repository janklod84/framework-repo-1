<?php 
namespace JanKlod\Database;

/**
 * @package  JanKlod\Database\QueryStatement
*/
class QueryStatement  extends \PDOStatement
{
	    
	    /**
	     * Excecute with params
	     * @param array $params 
	     * @return \PDOStatement
	     */
	    public function execute($params = [])
		{
		     return parent::execute($params);
		}
}
