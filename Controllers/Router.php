<?php
require_once "Views/View.php";
 class Router
 {
     
     private $_ctrl;
     private $_view;

     public function routereq(){
         try
         {
             //Chargement automatique des classes; 
            spl_autoload_register(function($class){
                require_once 'Model/'.$class.'.php';
            });
                //$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']
                $url = '';
                if(isset($_GET['url'])){
                    $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));
                    $controller = ucfirst(strtolower($url[0]));
                    $controllerClass = "Controller".$controller;              
                    $controllerFile = "Controllers/".$controllerClass.".php";
                    if(file_exists($controllerFile)){
                        require_once $controllerFile;
                        $this->_ctrl = new $controllerClass($url);
                    }else{
                        throw new Exception("The Page can't be found");
                    }
                }else{
                    require_once "Controllers/ControllerLoading.php";
                    $this->_ctrl = new ControllerLoading($url);
                }
            
         }
         catch(Exception $e)
         {
            $errorMessage = $e->getMessage();
            $this->_view = new View("error");
            $this->_view->generate(array("errorMessage" => $errorMessage));
         }
     }
 }