<?php 
namespace JanKlod\Http\Requests;


interface ResponseInterface
{     
	  /**
	   * Method implemented to send headers to server
	   * @return type
	  */
	  public function send();
}