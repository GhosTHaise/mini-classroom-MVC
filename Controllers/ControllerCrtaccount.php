<?php

use function PHPSTORM_META\type;

require_once("Views/View.php");

class ControllerCrtaccount{
    private $_RegisterInformation = [];
    private $_view;
    private $_CrtAccount;
    private $_Message = array();
    private $_statuAvailable;
    public function __construct()
    {
        if(isset($url) and count($url) > 1 ){
            throw new Exception("Page introuvable");
        }else{
            $this->_CrtAccount = new Crtaccount();
            if(isset($_POST['Username'],$_POST['Password'],$_POST['Email'],$_POST['Status'],$_POST['Classe'])){
                $this->CheckAccountValue($_POST['Username'],$_POST['Password'],$_POST['Email'],$_POST['Status'],$_POST['Classe']); 
                $this->VerifyFile($_FILES['Photo_Profil']);           
            }
                $this->createAccount();       
        }
    }

    private function createAccount(){
        $ClasseAvailable = $this->_CrtAccount->ClasseAvailable();
        if(count($this->_RegisterInformation) == 6){
            $this->_CrtAccount->newAccount($this->_RegisterInformation['username'],$this->_RegisterInformation['password'],$this->_RegisterInformation['status'],$this->_RegisterInformation['email'],$this->_RegisterInformation['photo_profil'],$this->_RegisterInformation['classe']);
            echo "votre compte a ete enregistre";
        }
        $this->_view = new View('Crtaccount');
        $this->_view->generate(array("message" => $this->_Message,"ClasseAvailable" => $ClasseAvailable));
                
    }
    private function CheckAccountValue($username,$password,$status,$email,$classe){
        if(isset($username,$password,$email,$status,$classe)){
            $this->hydrate($_POST);
        }else{
                $this->_Message['failure'] = "Registered failed , System Failure !";
        }
    }
    private function hydrate(array $data){
        foreach($data as $key => $value){
            $method = "Check".ucfirst(strtolower($key));
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    //Verifications des actions poster
    private function CheckUsername($username){
        if (is_string($username) and strlen($username) >= 4){
            if(preg_match("/^[a-zA-Z0-9 ]*$/",$username)){
                if(count($this->_CrtAccount->CheckInDB("username","'".$username."'")) < 1) {
                     $this->_RegisterInformation['username'] = $username ;
                }else{
                     $this->_Message['username'] = "This username is already used";
                }
            }else{
                $this->_Message['username'] = "Only Letters and Numbers are allowed";
            }           
        }else{
            $this->_Message['username'] = "Your Username is too short ...";
        }
    }
    private function CheckPassword($password){
        if(strlen($password) >= 8){
            if($password === $_POST["ConfirmPassword"]){
                $this->_RegisterInformation['password'] = $password;
            }else{
                $this->_Message['ConfirmPassword'] = "The two passwords do not match ...";
            }  
        }else{
            $this->_Message['password'] = "This Password is too short ...";
        }
    }
    private function CheckEmail($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            if(count($this->_CrtAccount->CheckInDB("email","'".$email."'")) < 1){
                $this->_RegisterInformation['email'] = $email;
            }else{
                $this->_Message['email'] = "This email is already associed with an account .";
            }
        }else{
            $this->_Message['email'] = "This email is invalid .";
        }
    }
    private function CheckStatus($status){
        $this->_statuAvailable = array("b59c67bf196a4758191e42f76670ceba","934b535800b1cba8f96a5d72f72f1611","64de166633d61c8326232568b42beef1");
        if(in_array($status,$this->_statuAvailable)==true){
            if($status  == "b59c67bf196a4758191e42f76670ceba"){
                $this->_RegisterInformation['status'] = 1111;
            }elseif($status  == "934b535800b1cba8f96a5d72f72f1611"){
                $this->_RegisterInformation['status'] = 2222;
            }else{
                $this->_Message['status'] = "Access Denied ???!";
            }
        }else{
            $this->_Message['status'] = "This status is invalid";
        }
    }
    private function CheckClasse(int $classe){
        $ListClasseAvailable = [];
        for($i = 0;$i<count($this->_CrtAccount->ClasseAvailable());$i++){ 
            array_push($ListClasseAvailable,$this->_CrtAccount->ClasseAvailable()[$i]->id_classe());
        }
        if(in_array(($classe),($ListClasseAvailable))==true and is_int(($classe))){
            $this->_RegisterInformation['classe'] = $classe;
        }else{
            $this->_Message['classe'] = "This class is not available !";
        }
    }
    private function VerifyFile(array $files){
        if(isset($files) and $files['name'] != ""){
            extract($files);
            $File_name = $name;
            $File_extension = strrchr($File_name,".");
            $File_tmp = $tmp_name;
            $Extension_Autorized = array('.webp','.WEBP','.jpeg','.JPEG','.jpg','.JPG','.png','.PNG','.gif','.GIF');
            if(in_array($File_extension,$Extension_Autorized)){
                $File_Dest = "Views/file/".$File_name;
                if(move_uploaded_file($File_tmp,$File_Dest)){
                    $this->_RegisterInformation['photo_profil'] = $File_Dest;
                }else{
                    $this->_Message['photo_profil'] = "failed to upload files in database ! 500";
                }
            }else{
                $this->_Message['photo_profil'] = "Please,choose a valid image !";
            }
        }else{
            $File_name = "DefaultImage";
            $File_extension = ".jpg";
            $this->_RegisterInformation['photo_profil'] = "Views/file/".$File_name;
        }
    }
}