<?php
class Login extends Model{
    private $_login;
    private $_userLog;
    public function Auth(ARRAY $d){
       return $this->getAll('id,username,statut,email,photo_profil',"Supremacy_InfoProject.account",'LoginEncrypted',"WHERE username=:username AND password=:password",$d); 
    }
    public function 
    UserPrivilege(ARRAY $d){
        $this->_login = $this->getAll('DISTINCT statut','Supremacy_InfoProject.account','LoginEncrypted','WHERE username=:username',$d);
        if($this->_login[0]->statut() == "#2f2ab4sprofsfpf22"){
            return $this->_statut = "Professeur";
        }else if($this->_login[0]->statut() == "#7f3ab4sadminfad81") {
            return $this->_statut = "Admin";
        }else{
            return $this->_statut = "Etudiant";
        }
    }
    
    
}