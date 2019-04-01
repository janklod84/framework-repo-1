<?php 
namespace JanKlod\Services;



/**
 * @package JanKlod\Foundation\Services\ServiceAliasRunner 
*/ 
class ServiceAliasRunner extends ServiceRunner
{
       
       /**
        * @var 
       */
	     public $name = 'alias';

       
       /**
        * Initialize service alias
        * @return type
       */
  	   public function init()
  	   {
             $datas = $this->getConfig();

             foreach ($datas as $alias => $class_name)
             {
                  if(class_exists($class_name))
                  {
                      class_alias($class_name, $alias);
                  }
             }
  	   }
}