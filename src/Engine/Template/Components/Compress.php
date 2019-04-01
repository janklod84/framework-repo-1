<?php 
namespace JanKlod\Template\Components;


/**
 * @package JanKlod\Template\Components\Compress
 */
class Compress 
{
      
      private $search =  [
            "/(\n)+/",
            "/\r\n+/",
            "/\n(\t)+/",
            "/\n(\ )+/",
            "/\>(\n)+</",
            "/\>\r\n</",
      ];
      
      private $replace = [
            "\n",
            "\n",
            "\n",
            "\n",
            '><',
            '><',
      ];
      
      /**
       * Compress content / data 
       * For exemple it used for HTML body
       * 
       * @param string $template
       * @return string
      */
	public function data(string $template = null)
	{
          return preg_replace($this->search, $this->replace, $template);
	}
}