<?php
require_once('Views/View.php');
class ControllerCoursretire{
    private $_cours_manager;
    private $_coursretire_view;
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
        $contenu = $this->_cours_manager->getContenu();
        if ($_GET['idfile']){
            
            $this->_cours_manager->Retire();
            
            
        }
        $this->_courscontent_view= new view('Coursretire');
        $this->_courscontent_view->generate(array ( "contenu" => $contenu));
    
        
    }
}

?>