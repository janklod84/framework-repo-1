<?php 
namespace JanKlod\FileSystem;


/**
 * @package File
**/
interface FileInterface
{
        
   
       /**
         * Generate full path to the given path
         *
         * @param string $path
         * @return string
	   */
       public function to(string $path): string;
       

}

