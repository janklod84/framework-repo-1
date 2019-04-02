<?php 
namespace app\models\Task;


/**
 * Repository task operation
 * @package app\models\Task\TaskManager 
*/ 
class TaskManager
{


        /**
         * @var int
        */
	private $id;


        /**
         * @var string
        */
	private $name;

        
        
        /**
         * Set name 
         * @param string $name 
         * @return void
        */
	    public function setName($name)
	    {
	    	$this->name = $name;
	    }


	    /**
         * Get name 
         * @return string
        */
	    public function getName()
	    {
	    	return $this->name;
	    }
}