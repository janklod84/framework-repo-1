<?php 
namespace JanKlod\Template;


/**
 * @package JanKlod\Template\ViewRepository
*/ 
class ViewRepository
{
      
      
            /**
             * @var File
            */
            private $file;


            /**
             * Constructor
             * @param File $file 
             * @return void
            */
            public function __construct($file)
            {
                  $this->file = $file;
            }


            /**
             * Generate full path
             * Give full path [absolute path]
             * @param string $path 
             * @return string
            */
            public function to($path)
            {
                 return $this->file->to($path);
            }

            
            /**
             * Determine if file exist
             * @param type $path ['app/views/main/index.php']
             * file->exist() verify autmatically Absolute path 
             * ex: base_path/app/view/main/index.php
             * sprintf('File <strong>%s</strong>', $path)
             * @return bool
            */
            public function hasPath($path)
            {
                if(!$this->file->exists($path))
                {
                     return false;   
                }
                return true;
            }
}