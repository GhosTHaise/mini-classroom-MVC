<?php
require_once("Views/View.php");
class ControllerLogin{
    private $_login;
    private $_header;
    private $_view;
    private $_Message = array();
    public function __construct($url)
    {
        if(isset($url) and count($url)<=1 and ucfirst(strtolower($url[0]))=='Login') {
            if(isset($_GET['logout_var'])){
                header("location:".URL."login");
                $this->log_out($_GET['logout_var']);
            }
            $this->login();    
            $this->_view = new View("Login");
            $this->_view->generate(array("message"=>$this->_Message));
            
        }else{
            throw new Exception("Page Introuvable ?");
    }  
    }
    private function login(){
        $this->_login = new Login();
        if((!isset($_SESSION['Username-name-tmp']) or $_SESSION['Username-name-tmp'] == NULL)){
            if(isset($_POST['username']) and isset($_POST['password'])){
                $loginFoundItems = $this->_login->Auth($_POST);
                if(count($loginFoundItems)==1){
                    $_SESSION['Auth'] = $loginFoundItems[0];
                    $_SESSION['Username-name-tmp'] = $_SESSION['Auth']->username();
                    $_SESSION['email-tmp'] = $_SESSION['Auth']->email();
                    $_SESSION['Photo-tmp'] = $_SESSION['Auth']->photo_profil();
                    $_SESSION['Userstatut'] = $_SESSION['Auth']->statut();
                    $this->_header = $this->_login->UserPrivilege(array('username' => $_SESSION['Auth']->username()));
                    $this->redirect($this->_header);
                }else{
                    $this->_Message['loginerror'] = "Please Check your Username or Password !";
                }
                
            }else{
                //echo ('You are not connected');
            }
        }else if(!isset($_GET['logout_var'])) {
            //var_dump($_SESSION['Username-name-tmp']);
            $this->_header = $this->_login->UserPrivilege(array('username' => $_SESSION['Username-name-tmp']));
            $this->redirect($this->_header);
        }
    }
    private function log_out($_LogOut){
        if(isset($_LogOut) and $_LogOut == "Deconnection"){
            session_destroy();
        }
    }
    private function redirect($url)
    {
        if (!headers_sent())
        {    
            header('Location: '.$url);
            exit;
            }
        else
            {  
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>'; exit;
        }
    }
}    