<?php 
namespace JanKlod\Container;


/**
 * @package JanKlod\Container\ContainerFactory
*/
class ContainerFactory
{
      
      /**
       * Create an container object 
       * that implements the interface ContainerInterface
       * 
       * @param ContainerInterface $container 
       * @return JanKlod\Container\ContainerInterface
       * @throws \Exception
      */
	  public static function build(ContainerInterface $container)
	  {
	  	   if(!$container instanceof ContainerInterface)
           {
                  throw new \Exception(sprintf("Sorry, this container <strong>%s</strong> can't be instantiated"));
           }
           return $container;
	  }
}