<?php 
namespace app\library;

use JanKlod\Library\Form;


/**
 * @package app\library\BootstrapForm 
*/ 
class BootstrapForm extends Form 
{

        //protected $surround = 'form-group';


	    /**
         * Open Form tag
         * @param array $attributes 
         * @return string
        */
        public function open($attributes = [])
        {
        	 $attributes['method'] = 'POST';
        	 $attributes['autocomplete'] = 'off';
        	 $attributes['id'] = 'form';
             return parent::open($attributes);
        }
        
        /**
         * Redefinition parent method input 
         * Here we'll use bootstrap form. that is the reason
         * 
         * @param array $attributes 
         * @param string $type 
         * @return string
         */
	    public function input($attributes = [], $type='text', $label='')
	    {      
	    	   $attributes['class'] = 'form-control';
	    	   return parent::input($attributes, $type, $label);
	    }

        
        /**
         * Redefinition method button form parent class Form
         * for adaptation to bootstrap form
         * 
         * @param array $attributes 
         * @param string $label 
         * @param string $type 
         * @return string
        */
	    public function button($attributes = [], $label = '', $type = 'button')
        {
        	 $attributes['class'] = 'btn btn-primary';
             return parent::button($attributes, $label, $type);
        }

}