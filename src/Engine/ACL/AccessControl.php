<?php 
namespace JanKlod\Access;

/**
 * Access Control List
 * @package JanKlod\Access\AccessControl
*/ 
class AccessControl 
{
      
       private $level = [];

       public static $isGuest = true;

       public static function isAdmin(){}
       public static function isUser() {}
       public static function isGuest() {}
}