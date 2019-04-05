<?php 
namespace app\controllers\admin;

use JanKlod\Http\Controller;
use \Auth;

/**
 * @package app\controllers\admin
 */
class AdminController extends Controller
{
        
        
        /**
         * set another layout
         * @var string
        */
        protected $layout = 'admin';


        /**
         * Constructor Admin
         * @param ContainerIntefcae $app 
         * @return void
        */
	    public function __construct($app)
	    {
	    	  parent::__construct($app);
	    	  
	    	  if(!Auth::isLogged())
              {
                  response()->redirect('/login');
              }
	    }

        
        /**
         * Show Listing
         * @return 
        */
	    public function index()
	    {
	    	 // die(__FILE__);
	    }

	   /**
	     * @return type
       */
	   public function logout()
	   {

	   }
}