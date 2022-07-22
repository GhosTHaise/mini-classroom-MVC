<?php
require_once("Views/View.php");
class ControllerAdmin
{
    private $_account;
    private $_view;
    private $_CrtAccount;
    private $_Message = array();

    public function __construct($url){
        if(isset($url) and count($url) > 1)
            throw new Exception("Page introuvable");
    else
        $this->account();
    }
    private function account(){
        $this->_account = new Admin();
        if (isset($_GET['search'])) {
            $account = $this->_account->searchAccount();
        }else{
            $account = $this->_account->getAccount();
        } 
        if(isset($_SESSION['Userstatut']) and $_SESSION['Userstatut'] == '#7f3ab4sadminfad81'){
        if(isset($_GET['modfid'])){
            $this->_CrtAccount = new Crtaccount();
            $this->ValidateUpdate();
            $ClasseAvailable = $this->_CrtAccount->ClasseAvailable();
            $OnlyAccount = $this->_account->getOneAccount('username,password,email',$_GET['modfid']);
            $this->_view = new View("Modif");
            $this->_view->generate(array("message"=>$this->_Message,"ClasseAvailable" => $ClasseAvailable,"OnlyAccount" => $OnlyAccount));
        }else{
            $this->_account->RmAccount();
            $this->_view = new View("Admin");
            if(isset($_GET['search'])){
                $this->_view->generateloading('Admin',array("account" => $account));
            }else{
                $this->_view->Generate(array("account" => $account));
            }
            
        }
        }else{
            throw new Exception("Acces refuse ! 700");
        }
        
        //echo "<pre>";
        //print_r($account);
    }
    private function ValidateUpdate(){
            if(isset($_POST['Musername'],$_POST['MPassword'],$_POST['Memail'],$_POST['Mstatut'],$_POST['Mclasse'])){
                if($_POST['Musername'] != ""){ 
                    if(count($this->_CrtAccount->CheckInDB("username","'".$_POST['Musername']."'")) < 1 or $_POST['Musername'] == $this->_CrtAccount->CheckInDB("id","'".$_GET['modfid']."'")[0]->username()){
                        if(strlen($_POST['MPassword'])>=8){
                            if(!filter_var($_POST['Memail'],FILTER_VALIDATE_EMAIL)===false and (count($this->_CrtAccount->CheckInDB("email","'".$_POST['Memail']."'")) < 1 or $_POST['Memail'] == $this->_CrtAccount->CheckInDB("id","'".$_GET['modfid']."'")[0]->email())){
                                $this->_account->UpdateAccount(array(':username'=>(string)$_POST['Musername'],":password"=>$_POST['MPassword'],":statut"=>(int) $_POST['Mstatut'],":email"=>$_POST['Memail'],":id_classe"=>(int) $_POST['Mclasse']));
                                header('location:'.'admin');
                            }else{
                                $this->_Message['email'] = "This email is invalid or already associed with an accounts";
                            }
                        }else{
                            $this->_Message['password'] = "This password is too short ..";
                        }
                    }else{
                        $this->_Message['username'] = "This usernane is already used .";
                    }
                }else{
                    $this->_Message['username'] = "Username should not be null.";
                }
            }
    }
}