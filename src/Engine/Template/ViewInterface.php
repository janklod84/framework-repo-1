<?php 
namespace JanKlod\Template;


/**
 * @package JanKlod\Template\ViewInterface
*/
interface ViewInterface
{
	 /**
	  * Render view
	  * @param string $template [ template path ]
	  * @param array $data [data to parse to view]
	  * @return mixed
	 */
     public function render(string $template, array $data = []);
}