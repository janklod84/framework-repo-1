<?php 
namespace JanKlod\Library;


/**
 * @package JanKlod\Library\Form 
*/
class Form 
{

        private $data;
        private $errors;

        /**
         * Permet d'initialiser des donnes dans le formulaire
        */
        /**
         * Initialize data in the form
         * @param type $data 
         * @return type
         */
        public function set($data)
        {
            $this->data = $data;
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
         * Get error and show them
         * @param string $field 
         * @return string
         */
        public function getError($field)
        {
        	 if(isset($this->errors[$field]))
        	 {
        	 	 return '<span class="error-msg">'. $this->errors[$field] .'</span>';

        	 }else{

        	 	return '';
        	 }
        }
        
        /**
         * Creer un input de type texte
         * @param string $field Nom du champ en base de donnee
         * @param string $label Nom du label (optionel)
         * @param array $attributes Attributes supplementaires au input
         * @return string
        **/
        public function input($field, $label = null, $attributes = [])
        {
        	if($label != null) { $label = ucfirst($field) . ' :'; }
    		$html = '<label class="desc">'. $label .'</label>';
            $value = isset($this->data[$field]) ? $this->data[$field] : '';

            $attr = '';
            foreach($attributes as $k => $v)
            {
            	$attr .= ' '.$k.'="'.$v.'"';
            }

            $html .= '<input type="text" id="input'. $field.'" value="'.$value.'" name="data['. $field .']" class="field text medium"'.$attr.'/>';;
            $html .= $this->getError($field);
            return $html;
        }

        /**
         * Cree un input Hidden
         * @param string $field
         * @param string
        **/
        public function hidden($field, $value='')
        {
        	// $value = isset($this->data[$field]) ? $this->data[$field] : $value;
        	// $html ='<input type="hidden" value="'. $value'" name="data['.$field.']" class="field text medium"/>';
        	// return $html;
        }

        /**
         * Creer un input FILE
         * @param string $field
         * @param string $label
         * @return string
        **/
        public function file($field, $label)
        {
             $html = '<label class="desc">'. $label .'</label>';
             $value = isset($this->data[$field]) ? $this->data[$field] : '';
             $html .= '<input type="file" name="'.$field .'"/>';
             $html .= $this->getErrors($field);
             return $html;
        }


         /**
         * Creer un SELECT
         * @param string $field champ en base
         * @param string $label Label a afficher
         * @param string $option Options du select valeur=>nom associe
         * @return string
        **/
         public function select($field, $label, $option)
         {
         	 $html = '<label class="desc">'. $label .'</label>';
         	 $value = isset($this->data[$field]) ? $this->data[$field] : '';
         	 $html .= '<select name="data['.$field.']"/>';
         	 foreach($option as $k => $v)
         	 {
         	 	 if($k == $this->data[$field])
         	 	 {
                     $html .= '<option value="'.$k.'" selected="selected">'. $v . '<option>';

         	 	 }else{
                     
                     $html .= '<option value="'.$k.'">'.$v.'</option>';
         	 	 }
         	 }

         	 $html .= '</select>';
         	 $html .= $this->getError($field);
         	 return $html;
         }

         /**
          * Cree une liste de checkbox
          * @param <type> $field Nom du champ en base
          * @param <type> $label
          * @param <type> $option Liste des checkbox valeur => nom associe
          * @return string
         **/
         public function checkbox($field, $label, $option)
         {
         	  $html = '<label class="desc">'. $label .'</label>';
         	  $value = isset($this->data[$field]) ? $this->data[$field] : '';

         	  if(!is_array($this->data[$field]))
         	  {	 
         	  	 $ids = explode(',', $this->data[$field]);

         	  }else{
                 
                 $ids = $this->data[$field];
         	  }

         	  foreach($option as $k => $v)
         	  {
         	  	  if(in_array($k, $ids))
         	  	  {
         	  	  	  $html .= '<input type="checkbox" name="data['.$field.'][]" value="'.$k.'" checked />'.$v;
         	  	  }else{
                     
                     $html .= '<input type="checkbox" name="data['.$field.'][]" value="'.$k.'"/>'.$v;
         	  	  }

         	  	  $html .= '<br>';

         	  }


     	  	  $html .= $this->getError($field);
     	  	  return $html;
         }
     

}

/**
 Test

 On récupère les données de la base $ps = $pdo->query('SELECT nom,prenom,email FROM users WHERE users.id = 154'); $data = $ps->fetch(); // On crée notre objet Form
  
 $form = new form(); 
 $form->set($data); // On crée nos champs 
 echo $form->input('nom','Votre nom :'); 
 echo $form->input('prenom','Votre prénom:'); 
 echo $form->input('email','Votre email :'); // Génère des input avec les valeur bien remplies et des labels liés. 

 **/