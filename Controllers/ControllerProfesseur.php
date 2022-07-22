<?php
require_once("Views/View.php");
class ControllerProfesseur{
    private $_view;
    private $_professeur;
    public function __construct($url)
    {
        if(isset($url) and count($url)>1){
            throw new Exception("Page introuvable");
        }else{
            if(isset($_SESSION['Userstatut']) and ($_SESSION['Userstatut'] == '#2f2ab4sprofsfpf22' or $_SESSION['Userstatut'] == '#7f3ab4sadminfad81')){
                 $this->Professeur();
            }else{
                throw new Exception('Acces refuse ! 770');
            }
        }
    }
    private function Professeur(){
        $this->_view = new View('Professeur');
        $this->_view->generate(array());
    }
}