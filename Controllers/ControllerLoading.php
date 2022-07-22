<?php
require_once("Views/View.php");
class ControllerLoading
{ 
    private $_view;
    public function __construct()
    {
        $this->chargement();
    }

    public function chargement(){
        $this->_view = new View("loading");
        $this->_view->generateloading('Loading',array());
    }
}