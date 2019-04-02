<?php 
namespace JanKlod\Validation;


/**
 * @package JanKlod\Validation\ValidationError
*/
class ValidationError
{
        
        /**
         * @var string
        */
        private $key;

        /**
         * @var string
        */
        private $rule;


        /**
         * @var array
        */
        private $attributes;
        

        /**
         * Message Data
         * This 'll be removed !!
         * 
         * @var array
        */
        private $messages = [
             'required'      => 'Le champs %s est requis',
             'empty'         => 'Le champs %s ne peut etre vide',
             'slug'          => 'Le champs %s n\'est pas un slug valide',
             'minLength'     => 'Le champs %s doit contenir plus de %d caracteres',
             'maxLength'     => 'Le champs %s doit contenir moins de %d caracteres',
             'betweenLength' => 'Le champs %s doit contenir entre %d et %d caracteres',
             'datetime'      => 'Le champs %s doit etre une date valide (%s)',
             'exists'        => 'Le champs %s n\'existe pas sur dans la table (%s)',
             'unique'        => 'Le champs %s doit etre unique',
             'filetype'      => 'Le champs %s n\'est pas format valide (%s)',
             'uploaded'      => 'Vous devez uploader un fichier'
        ];

        
        /**
         * Construct 
         * @param string $key 
         * @param string $rule 
         * @param array $attributes 
         * @return void
        */
    	  public function __construct(string $key, string $rule, array $attributes = [])
    	  {
                $this->key        = $key;
                $this->rule       = $rule;
                $this->attributes = $attributes;
    	  }

      
        /**
         * __toString() Show object as string
         * @return string
        */
    	  public function __toString()
    	  {
    	  	  $params = array_merge([$this->messages[$this->rule], $this->key], $this->attributes);

              return (string)call_user_func_array('sprintf', $params);

              #!-- return sprintf($this->messages[$this->rule], $this->key);
    	  }
}