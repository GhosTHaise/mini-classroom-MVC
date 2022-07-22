<?php
require_once("Views/View.php");
class ControllerEtudiant{
    private $_view;
    public function __construct($url){
        if(isset($url) and count($url) > 1)
            throw new Exception("Page introuvable");
        else
        if(isset($_SESSION['Userstatut']) and ($_SESSION['Userstatut'] == '#1f1ab4setudifad11' or $_SESSION['Userstatut'] == '#7f3ab4sadminfad81')){
            $this->Etudiant();
        }else{
            throw new Exception("Acces refuse ! 707");
        }
            
    }
    private function Etudiant(){
        $this->_view = new View('Etudiant');
        $this->_view->generateloading('Etudiant',array("date"=>$this->GetDates()));
    }
    public function GetDates(){
        $month = array("January","February","March","April","May","June","July","August","September","October","November","December");
        return(array("day" => date('d'),"month"=>$month[date('m')-1],"year"=>date('Y')));
    }
}