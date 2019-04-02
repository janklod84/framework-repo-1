<?php 
namespace JanKlod\Library\Repository;


/**
 * @package JanKlod\Library\Repository\FormRepository 
*/
class FormRepository
{
      
      /**
       * Type fields container
       * @const array
      */
      const TYPE_FIELDS = [
      	'label'    => '<label for="%s">%s</label>',
        'input'    => '<input type="%s" %s>',
        'select'   => '<select name="%s">%s</select>',
        'textarea' => '<textarea %s>%s</textarea>',
        'option'   => '<option value="%s">%s</option>'
      ];


      /**
         * Get input field
         * @param string $type 
         * @param array $attributes 
         * @return string
      */
	  public static function controlInput($type, $attributes)
	  {
	       return sprintf(self::TYPE_FIELDS['input'] . PHP_EOL, 
	       	              $type, 
	       	              self::getAttributes($attributes)
	       	       );
	  }


       
       /**
        * Get input attributes
        * @return string
       */
	   public static function getAttributes($attributes)
	   {
	   	    $output = '';
            if(!empty($attributes))
            {
            	foreach($attributes as $name => $value)
                {
                	 if(is_array($value)) { $value = implode(';', array_values($value)); }
                     $output .= sprintf(' %s="%s"', $name, $value);
                }
                return $output;
            }
	   }

}

