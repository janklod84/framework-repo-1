<?php 
namespace JanKlod\Library;


use JanKlod\Library\Repository\FormRepository;


/**
 * @package JanKlod\Library\Form 
*/
class Form 
{


        /**
         * Data from anywhere [Request., Database ..]
         * @var array
        */
        protected $data = [];

    

        /**
         * Errors containers
         * @var array
        */
        protected $errors = [];

        
        /**
         * Constructor
         * @param array $data 
         * @return void
         */
        public function __construct($data = [])
        {
               $this->data = $data;
        }

       
        /**
         * Set data parses form
         * @param array $data 
         * @return void
        */
        public function set(array $data = [])
        {
             $this->data = $data;
        }


        /**
         * get data from form
         * @return data
        */
        public function get()
        {
            return $this->data;
        }

        
        /**
         * Set errors
         * @param array $errors
         * @return void
        */
        public function setErrors($errors)
        {
             $this->errors = $errors;
        }

        
        /**
         * Generate any input field
         * @param string $type 
         * @param array $attributes 
         * @return string
        */
        public function input($attributes = [], $type = 'text')
        {
             return FormRepository::controlInput($type, $attributes);
        }

        /**
         * Generate input field type text
         * @param array $attributes 
         * @return string
        */
        public function text($attributes = [])
        {
             return FormRepository::controlInput('text', $attributes);
        }

        
        /**
         * Get input type file
         * @param array $attributes 
         * @return string
        */
        public function file($attributes)
        {
             return FormRepository::controlInput('file', $attributes);
        }


        /**
         * Generate input field type text
         * @param array $attributes 
         * @return string
        */
        public function textarea($attributes = [])
        {
             return sprintf(FormRepository::TYPE_FIELDS['textarea'], 
                          FormRepository::controlInput($attributes)
                   );
        }

}

