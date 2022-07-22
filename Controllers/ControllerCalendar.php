<?php 
require_once("Views/View.php");
class ControllerCalendar{
    private $_view;
    private $_calendar;
    public function __construct($url)
    {
        if(isset($url) and count($url) > 1)
            throw new Exception("Page introuvable");
        else
            $this->Calendar();
    }
    public function Calendar(){
        $this->_view = new View('Calendar');
        $this->_view->generate(array("Date" => $this->GetDate()));
    }
    public function GetDate(){
        $month = array("January","February","March","April","May","June","July","August","September","October","November","December");
        return(array("day" => date('d'),"month"=>$month[date('m')-1],"year"=>date('Y')));
    }
    

}
