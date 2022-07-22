C<?php
require_once('Model.php');
   class CoursManager extends Model{
       public function getCours(){
         $this->getBdd();  
         if(isset($_GET['mcodecours'])){

             return $this->getAll2('cours','Cours','WHERE code_cours='.$_GET['mcodecours']);
            }elseif (isset($_GET['vcodecours'])) {
                
                return $this->getAll2('cours','Cours','WHERE code_cours='.$_GET['vcodecours']);
            }
            else{
                return $this->getAll2('cours','Cours','');
                
                
            }  
        }
        public function prof(){
            $this->getBdd();
            return $this->getAll2('account','Cours','WHERE id=1');
            echo 'moi';
        }
        public function getContenu(){
            $this->getBdd();
            if (isset($_GET['vcodecours'])){
                
                return $this->getAll2('Contenu','Cours','WHERE code_cours='.$_GET['vcodecours']);
            }elseif(isset($_GET['mcodecours'])){
                
            return $this->getAll2('Contenu','Cours','WHERE code_cours='.$_GET['mcodecours']);
            
        }elseif(isset($_GET['idfile'])){
            
            return $this->getAll2('Contenu','Cours','WHERE id_contenu='.$_GET['idfile']);
            
        }
    }
       public function Rmvbaby(){
        if (isset($_GET['scodecours'])){
            $this->Removebaby("Contenu","WHERE code_cours=".$_GET['scodecours']);
            $this->Removebaby("cours","WHERE code_cours=".$_GET['scodecours']);
            
        }
       
        
       }
       public function Insertfile($titre_contenu,$emplacement,$code_cours){

           $this->Insertbaby('Supremacy_InfoProject.Contenu','Titre_Contenu,Enplacement,code_cours',"'$titre_contenu','$emplacement',$code_cours");
           
       }
       public function Insertnew($code_cours,$titre_contenu,$nom_cours){
                $this->Insertbaby("Supremacy_InfoProject.cours","code_cours,nom_cours,volume_horaire,id","$code_cours,'$nom_cours',12,2");  
        
    } 
    
       public function Update_titre($titre_contenu){
           
           $this->Update("Contenu","Titre_contenu='$titre_contenu'","WHERE code_cours=".$_GET['mcodecours'],array());
       } 

    public function Update_nom($nom_cours){
           
        $this->Update("cours","nom_cours='$nom_cours'","WHERE code_cours=".$_GET['mcodecours'],array());
    } 
    public function Update_emplacement($emplacement){
           
        $this->Update("Contenu","Emplacement='$emplacement'","WHERE code_cours=".$_GET['mcodecours'],array());
    }
    public function Retire(){
        if($_GET['idfile']){
            $this->Update("Contenu","Emplacement=''","WHERE id_contenu=".$_GET['idfile'],array());
    
        }

    } 
     
   }
  
?>