<?php

class Admin extends Model{
    private $_idcompte;
    private $searchWord;
    public function getAccount(){
       return $this->getAll('*','Supremacy_InfoProject.account account','Account','JOIN Supremacy_InfoProject.classe classe ON (account.id_classe = classe.id_classe)',array());
    }
    public function getOneAccount(string $colonne,int $ident){
        return $this->getAll($colonne,'Supremacy_InfoProject.account','Account',' WHERE id = '.$ident,array());
    }
    public function searchAccount(){
        return $this->getAll('*','Supremacy_InfoProject.account account','Account',"JOIN Supremacy_InfoProject.classe classe ON (account.id_classe = classe.id_classe) WHERE username LIKE '%".$this->searchValue($_GET['search'])."%'",array());
    }

    public function RmAccount(){
        if(isset($_GET['supprid'])){
            $this->Delete('Supremacy_InfoProject.account','WHERE id = '.$_GET['supprid']);
            header('location:'.'admin');
       }
    }
    public function UpdateAccount(array $Values){
        $this->Update('Supremacy_InfoProject.account'," username = :username , password = :password , statut = :statut , email = :email , id_classe = :id_classe","id =".(int)$_GET['modfid'],$Values);
    }
}