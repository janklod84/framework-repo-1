<?php 
namespace JanKlod\Services;


use JanKlod\Container\ContainerInterface;


/**
 * @package ServiceInterface
**/
interface ServiceInterface
{
       
       /**
        * Constructor
        * @param  \Janklod\Container\ContainerInterface $app
       */
       public function __construct(ContainerInterface $app);

}