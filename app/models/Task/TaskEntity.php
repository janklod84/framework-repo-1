<?php 
namespace app\models\Task;


/**
 * @package app\models\Task\TaskEntity 
*/ 
class TaskEntity 
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