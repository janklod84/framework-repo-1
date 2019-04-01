<?php 
namespace JanKlod\Foundation;


use JanKlod\Container\ContainerFactory;
use JanKlod\Container\DI\DIC;



/**
 * @package Janklod\Application
*/
final class Application 
{
         
		 
          /**
           * Contain instance of Application
           * @var JanKlod\Application
          */
          private static $instance;


          /**
           * Container Dependency Injection
           * @var JanKlod\DI
          */
          private $app;


          /**
           * Contructor
           * @param string $root
           * @return void
          */
          private function __construct($root)
          {
               if(is_null($root))
               {
                   exit('Sorry, root directory is required!');
               }

               $this->app = ContainerFactory::build(new DIC([
                   'root' => $root
               ]));

               new Bootstrap($this->app);
          }



          public function testing()
          {
               // $this->get('db.config');
               // dd($this->get('db'));

               $pdo = $this->get('db');


               // $pdo->query('INSERT INTO users (login, password) VALUES (:login, :password)', 
               // [
               //    'login' => 'Jean',
               //    'password' => '1234'
               // ]);

               $data = $pdo->query('SELECT * FROM users')->fetchAll();


               debug($data);

          }


          /**
           * Break Point of Application
           * $obj = $this->app->make('JanKlod\\Test');
           * $obj->show();
           * debug(\JanKlod\Routing\RouteCollection::find('POST'));
           * $output = (string) $this->get('router')->dispatch();
           * $response = $this->get('response');
           * $response->setBody($output);
           * $response->send();
           * 
           * @return mixed
          */
          public function run()
          {
              $this->testing();

              $output = (string) $this->get('router')->dispatch();
              $response = $this->get('response');
              $response->setBody($output);
              $response->send();
          } 


          
          /**
          * Bind key and value in DIC
          * @param string $key 
          * @param type $resolver 
          * @return void
          */
          public function bind(string $key, $resolver)
          {
               $this->app->set($key, $resolver);
          }



         /**
          * Make Object Factory
          * Create new object [ex: (new Application())->make(Blog::class) ]
          * 
          * $obj = $this->app->make('JanKlod\\Test');
          * $obj->show()
          * 
          * @param string $name 
          * @return object
         */
         public function make(string $name): object
         {
              return $this->app->make($name);
         }

         
         /**
          * Set object as singleton
          * @param string $key 
          * @param mixed|callable $resolver 
          * @return void
         */
         public function singleton(string $key, $resolver)
         {
              $this->app->singleton($key, $resolver);
         }

        
         /**
           * get resolver by key 
           * @param string $key 
           * @return mixed
         */
         public function get($key)
         {
              return $this->app->get($key);
         }
		 
 
          /**
           * @param  string $root
           * @return JanKlod\Foundation\Application
          */
          public static function instance(string $root = null): self
          {
               if(is_null(self::$instance))
               {
                   self::$instance = new self($root);
               }

               return self::$instance;
          }


}