<?php 
namespace JanKlod\FileSystem;


use JanKlod\FileSystem\Exceptions\FileException;


/**
 * @package File
**/
class File
{
        
       
       /**
        * Directory Separator
        * @const string
       */
       const DS = DIRECTORY_SEPARATOR;


       /**
        * @var string
       */
       private $root;
       
     
       /**
        * File constructor.
        * @param string $root
        * @return void
        * @throws 
       */
       public function __construct(string $root)
       {
            if(is_null($root))
            {
                throw new FileException('Set please root directory for loading path !');
            }

            $this->root = trim($root, '/');
       }

       
       /**
        * Determine wether the given file path exists
        * @param string $file
        * @return bool
       */
       public function exists(string $file): bool
       {
            return file_exists($this->to($file));
       }

       
       /**
        * Require  The given file
        *
        * @param string $file
        * @return void
       */
        public function call(string $file)
        {
            $path = $this->to($file);
            return $this->check($path);
        }

        
        /**
         * Require many files
         * @param array $files 
         * @return bool
         */
        public function calls(array $files = [])
        {
              foreach($files as $file)
              {
                   $this->call($file);
              }
        }

        /**
         * Require / Check File
         * @param string $path 
         * @return type
        */
        public function check($file)
        {
             return require_once($file);
        }


       /**
         * Generate full path to the given path
         *
         * @param string $path
         * @return string
       */
       public function to(string $path): string
       {
            return $this->root . $this->preparePath($path);
       }
    
       /**
        * Get path details informations
        * @param type $path 
        * @return type
        */
       public function details($path)
       {
           return pathinfo($path);
       }

       
       /**
        * Scan file and return alls path type
        * @param string $path 
        * @return array
       */
       public function map($path)
       {   
            return !is_null($path) ? glob($this->to($path)) : [];
       }

       
       /**
        * Prepare path 
        * @param string $path 
        * @return string
       */
       private function preparePath(string $path): string
       {
            return self::DS. str_replace(['/', '\\'], static::DS, trim($path, '/'));
       }
}

