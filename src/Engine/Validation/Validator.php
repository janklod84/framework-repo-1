<?php 
namespace JanKlod\Validation;


/**
 * @package JanKlod\Validation\Validator
*/
class Validator  implements ValidationInterface
{
        
        const MIME_TYPES = [
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'pdf' => 'application/pdf'
        ];


        /**
         * @var array
        */
        private $params;
        

        /**
         * @var string[] Tableau de chaine de caracteres stockant les erreurs
        */
        private $errors = [];

        
        /**
         * Constructor
         * @param array $params 
         * @return void
        */
  	    public function __construct(array $params = [])
  	    {
                $this->params = $params;
  	    }
        
        
        /**
         * Set params
         * @param array $params 
         * @return void
        */
        public function setParams(array $params)
        {
             $this->params = $params;
        }


        /**
         * Get params
         * @return array
        */
        public function getParams()
        {
             return $this->params;
        }


        /**
         * Verify if all fields in array
         * 
         * @var string[] ...$keys
         * @return Validator
        */
	      public function required(string ...$keys): self
		    {
			       foreach($keys as $key)
			       {
    			     	 $value = $this->getValue($key);

    			     	 if(is_null($value))
    			     	 {
    			              $this->addError($key, 'required');
    			     	 }
			      }

			      return $this;
        }

        
        /**
         * Verify if all fields not empty
         * 
         * @var string[] ...$keys
         * @return Validator
        */
        public function notEmpty(string ...$keys): self 
        {
        	     foreach($keys as $key)
			     {
			     	 $value = $this->getValue($key);

			     	 if(is_null($value) || empty($value))
			     	 {
			              $this->addError($key, 'empty');
			     	 }
			     }

			     return $this;
        }

        
        /**
         * Validate length 
         * @param string $key 
         * @param ?int $min 
         * @param ?int|null $max 
         * @return type
        */
        public function length(string $key, ?int $min, ?int $max = null): self
        {
               $value = $this->getValue($key);
               $length = mb_strlen($value);

               if(
               	  !is_null($min) &&
               	  !is_null($max) &&
               	  ($length < $min || $length > $max)
               	)
               {
                     $this->addError($key, 'betweenLength', [$min, $max]);
                     return $this;
               }

               if(
               	  !is_null($min) &&
               	  ($length < $min)
               	)
               {
                     $this->addError($key, 'minLength', [$min]);
                     return $this;
               }

               if(
               	  !is_null($max) &&
               	  ($length > $max)
               	)
               {
                     $this->addError($key, 'maxLength', [$max]);
                     // return $this;
               }

               return $this; // au cas ou il n'y a pas d'erreur
        }


	    /**
        * Verify if element is slug
        * @param string $key
        * @return Validator
      */
	    public function slug(string $key): self
	    {

	    	    $value = $this->getValue($key);

            $pattern = '/^[a-z0-9]+(-[a-z0-9]+)*$/'; // regex

            if(!is_null($value) && !preg_match($pattern, $this->params[$key])) 
            {
            	$this->addError($key, 'slug');
            }

            return $this;
	    }

        
        /**
         * Validate datetime
         * @param string $key
         * @return Validator
        */
        public function dateTime(string $key, string $format = "Y-m-d H:i:s"): self
        {
            	$value    = $this->getValue($key);
            	$date = \DateTime::createFromFormat($format, $value); // var_dump($date);
            	$errors   = \DateTime::getLastErrors(); 
                
               // dd($errors);

                if($errors['error_count'] > 0 || 
                   $errors['warning_count'] > 0 || 
                   $date === false)
                {
                	   $this->addError($key, 'datetime', [$format]);
                }

                return $this;
        }

        
         /**
         * Determine if the key exist in the current table
         * 
         * @param string $key
         * @param string $table
         * @param \PDO $pdo
         * @return Validator
        */
        public function exists(string $key, string $table, \PDO $pdo): self
        {
             
              $value = $this->getValue($key);
              $statement = $pdo->prepare("SELECT id FROM $table WHERE id = ?");
              $statement->execute([$value]); 
            
              if($statement->fetchColumn() === false) 
              {
                   $this->addError($key, 'exists', [$table]);
              }

              return $this;
        }

         /**
         * Determine if the current cle is unique in table
         * 
         * @param string $key
         * @param string $table
         * @param \PDO $pdo
         * @param int|null $exclude
         * @return Validator
        */
        public function unique(
          string $key, 
          string $table, 
          \PDO $pdo, 
          ?int $exclude = null): self
        {
             
              $value = $this->getValue($key);
              $query = "SELECT id FROM $table WHERE $key = ?";
              $params = [$value];

              if($exclude !== null)
              {
                   $query .= " AND id != ?";
                   $params[] = $exclude;
              } 

              $statement = $pdo->prepare($query);
              $statement->execute($params); 
            
              if($statement->fetchColumn() !== false) 
              {
                   $this->addError($key, 'unique', [$value]);
              }

              return $this;
        }



        /**
         * Determine if file is uploaded successfully
         * 
         * @param string $key
         * @return Validator
        */
        public function uploaded(string $key): self 
        {
             $file = $this->getValue($key);
             if($file === null || $file->getError() !== UPLOAD_ERR_OK)
             {
                  $this->addError($key, 'uploaded');
             }

             return $this;
        }


        /**
         * verify format of file [ extension ]
         * 
         * @param string $key
         * @param array $extensions
         * @return Validator
        */
        public function extension(string $key, array $extensions): self
        {

             /** @var UploadedFileInterface $file */
             $file = $this->getValue($key);

             if($file !== null && $file->getError() === UPLOAD_ERR_OK)
             {
                  $type = $file->getClientMediaType();

                  $extension = mb_strtolower(pathinfo($file->getClientFilename(), PATHINFO_EXTENSION));
                  
                  $expectedType = self::MIME_TYPES[$extension] ?? null;

                  if(!in_array($extension, $extensions) || $expectedType !== $type)
                  {
                       $this->addError($key, 'filetype', [join(',', $extensions)]);
                  }
             }

             return $this;
        }
        

        /**
         * Determine if has no errors
         * if empty errors array 
         * If all parses data valid
         * 
         * @return boolean
        */
  	    public function isValid(): bool
  	    {
              return empty($this->errors);
  	    }


        /**
         * Check errors
         * @return ValidationErrror[]
        */
  	    public function getErrors(): array
  	    {
              return $this->errors;
  	    }

        
        /**
         * Add Error
         * 
         * @param string $key
         * @param string $rule
         * @param array $attributes
         * @return void
        */
  	    private function addError(string $key, string $rule, array $attributes = []): void
  	    {
              $this->errors[$key] = new ValidationError($key, $rule, $attributes);
  	    }


  	    /**
  	     * Get value
         * @param string $key 
  	    */
  	    private function getValue(string $key) 
  	    {
    	    	 if(array_key_exists($key, $this->params))
    	    	 {
    	    	 	  return $this->params[$key];
    	    	 }

    	    	 return null;
  	    }

}

