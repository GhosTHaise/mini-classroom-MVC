<?php 
class Crtaccount extends Model{
    public function newAccount($_username,$_password,$_statut,$_email,$_photo_profil,$_id_classe){
        $this->Insert("Supremacy_InfoProject.account ","username,password,statut,email,photo_profil,id_classe","'".$_username."','".$_password."',".$_statut.",'".$_email."','".$_photo_profil."',".$_id_classe);
        header('location:'.'login');
    }
    public function ClasseAvailable(){
        return array_slice($this->getAll("DISTINCT *","Supremacy_InfoProject.classe","Classe"," ",array()),1);
    }
    public function CheckInDB(string $Cln2Check,string $condValue){
        return $this->getAll("*","Supremacy_InfoProject.account","Account","WHERE ".$Cln2Check." = ".$condValue,array());
    }
}