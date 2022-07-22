<?php
require_once('Views/View.php');
class ControllerCours{
    private $_cours_manager;
    private $_cours_view;
    public function __construct($url){
        if (isset($url) && count($url)> 1){
            throw new Exception('Page introuvable');
        }
        else{
            $this->cours();
        }
    }
    public function cours(){
        $this->_cours_manager = new CoursManager();
        $cours = $this->_cours_manager->getCours();
        $this->_cours_manager->Rmvbaby();
        $this->_cours_view= new view('Cours');
        $this->_cours_view->generateloading('Cours',array ("cours" => $cours));
        
    
        
    }
}

?>