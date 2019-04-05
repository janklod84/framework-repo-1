<?php 
namespace JanKlod\Validation;


use JanKlod\Database\Special\ActiveRecord;


/**
 * @package JanKlod\Validation\Validate
*/
class Validate
{
	
		 /**
		  * @var bool
		 */
		 private $passed = false;
		 
	     
	     /**
	      * @var array errors
	     */
		 private $errors = [];

		 
		 /**
		  * @var DB
		 */
		 private $db = null;

	     
		 /**
		  * Constructor 
		  * @return void
		 */
		 public function __construct()
		 {
		 	 $this->activeRecord = new ActiveRecord();
		 }

	     
	     /**
	      * Check source and items
	      * @param string $source 
	      * @param array $items 
	      * @return mixed
	     */
		 public function check($source, $items = [])
		 {
		 	  foreach($items as $item => $rules)
		 	  {
		 	  	  foreach($rules as $rule => $rule_value)
		 	  	  {
		 	  	  	    $value = trim($source[$item]);
		 	  	  	    $item  = escape($item);

		 	  	  	    if($rule === 'required' && empty($value))
		 	  	  	    {
	                          $this->addError("{$item} is required");

		 	  	  	    }else if(!empty($value)){

	                         switch($rule)
	                         {
	                         	  case 'min':
	                                 if(strlen($value) < $rule_value)
	                                 {
	                                    $this->addError("{$item} must be a minimum of {$rule_value} characters.");
	                                 }
	                         	  break;
	                         	  case 'max':
	                         	     if(strlen($value) > $rule_value)
	                                 {
	                                    $this->addError("{$item} must be a maximum of {$rule_value} characters.");
	                                 }

	                         	  break;
	                         	  case 'matches':
	                         	     if($value != $source[$rule_value])
	                         	     {
	                         	     	  $this->addError("{$rule_value} must match {$item}");
	                         	     }

	                         	  break;
	                         	  case 'unique':
	                                $check = $this->activeRecord->get($rule_value, $item, $value);
                                    if($check->rowCount())
                                    {
                                  	   $this->addError("{$item} already exists.");
                                    }
	                         	    break;
	                         }
		 	  	  	    }
		 	  	  }
		 	  }


		 	  if(empty($this->errors))
		 	  {
		 	  	   $this->passed = true;
		 	  }

		 	  return $this;
	     
	     }

         
         
         /**
          * Get errors
          * @return type
         */
		 public function errors()
		 {
		 	  return $this->errors;
		 }

         
         /**
          * return true or false if no errors
          * @return bool
         */
		 public function passed(): bool
		 {
		 	  return $this->passed;
		 }



         /**
          * Add error
          * @param string $error 
          * @return void
         */
		 private function addError($error)
		 {
	          $this->errors[] = $error;
		 }

}