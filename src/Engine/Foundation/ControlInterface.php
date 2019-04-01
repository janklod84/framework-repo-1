<?php 
namespace JanKlod\Foundation;

/**
 *@package JanKlod\Foundation\ControlInterface
*/
interface ControlInterface 
{
	/**
	 * Capture current action to control
	 * @return mixed
	*/
	public function capture();
}
