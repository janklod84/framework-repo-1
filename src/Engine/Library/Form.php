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
         * Surround inputs fields with html tag
         * @var string
        */
        protected $surround = 'div';


        
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
         * Open Form tag
         * @param array $attributes 
         * @return string
        */
        public function open($attributes = [])
        {
             return FormRepository::controlForm($attributes);
        }


        /**
         * close Form tag
        */
        public function close()
        {
            return '</form>'.PHP_EOL;
        }

        
        /**
         * Surround field
         * @param string $data 
         * @return string
        */
        public function surround($data, $attributes = [])
        {
             return sprintf(FormRepository::TYPE_FIELDS['surround'], $this->surround, $data, $this->surround);
        }

        
        /**
         * Generate any input field
         * $form->input([
         *    'placeholder' => "Enter your login",
         *    'id' => 'password'
         * ], 'password', 'Login'); 
         * 
         * @param string $type 
         * @param array $attributes 
         * @return string
        */
        public function input($attributes = [], $type = 'text', $label = '')
        {
             return FormRepository::controlInput($type, $attributes, $label);
        }



        /**
         * Generate input field type text
         * @param array $attributes 
         * @return string
        */
        public function text($attributes = [], $label = '')
        {
             return FormRepository::controlInput('text', $attributes, $label);
        }

        
        /**
         * Get input type file
         * @param array $attributes 
         * @return string
        */
        public function file($attributes, $label = '')
        {
             return FormRepository::controlInput('file', $attributes, $label);
        }


        /**
         * Generate input field type text
         * @param array $attributes 
         * @return string
        */
        public function textarea($attributes = [], $label = '')
        {
             return sprintf(FormRepository::TYPE_FIELDS['textarea'], 
                          FormRepository::controlInput($attributes, $label)
                   );
        }
       
        
        /**
         * Generate button field
         * @param array $attributes 
         * @param string $label 
         * @param string $type 
         * @return string
        */
        public function button($attributes = [], $label = '', $type = 'button')
        {
             return FormRepository::controlButton($attributes, $label, $type);
        }

}

