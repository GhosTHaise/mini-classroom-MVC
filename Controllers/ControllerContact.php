<?php 
require_once("Views/View.php");
class ControllerContact{
    private $_view;
    private $_chat;
    private $_message;
    public function __construct($url)
    {
        if(isset($url) and count($url) > 1)
            throw new Exception("Page introuvable");
    else
        $this->_chat = new Contact();
        $this->Contact();
    }
    private function Contact(){
        if(isset($_POST['Message'])){
            $this->_chat->sendMessage($_SESSION['email-tmp'],'',$_POST['Message'],'');
            header('location:'.'Etudiant');
        }else{
            $this->_message = $this->_chat->ReceiveMessage();
        $this->_view = new View('Contact');
        $this->_view->generateloading('Contact',array('Message'=>$this->_message));
        }
        
    }
}

