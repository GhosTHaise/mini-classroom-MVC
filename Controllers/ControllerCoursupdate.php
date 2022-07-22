<?php
require_once('Views/View.php');
class ControllerCoursupdate{
    private $_cours_manager;
    private $_coursupdate_view;
    public function __construct($url){
        if (isset($url) && count($url)> 1){
            throw new Exception('Page introuvable');
        }
        else{
            $this->cours();
        }
    }
    public function cours(){
        $this->_cours_manager = new CoursManager();
        $cours = $this->_cours_manager->getCours();
        $contenu = $this->_cours_manager->getContenu();
        if (isset($_POST['update'])){ 
        if (isset($_POST['titre_contenu'])  
        
            && isset($_POST['nom_cours'])){
                if (!empty($_POST['titre_contenu']) 
                && !empty($_POST['nom_cours'])){
                        $titre_contenu=$_POST['titre_contenu'];
                        $this->_cours_manager->Update_titre($titre_contenu);
                    
                    

                        $nom_cours=$_POST['nom_cours'];
                        $this->_cours_manager->Update_nom($nom_cours);
                    
                        //Pour les fichiers
                        if(isset($_POST['fileupdate'])){

                            $fileCount= count($_FILES['fileupdate']['name']);
                            for($i=0;$i<$fileCount;$i++){
     
                                $emplacement=$_FILES['fileupdate']['name'][$i];
                                $tmp_name=$_FILES['fileupdate']['tmp_name'][$i];
                                $this->_cours_manager->Update_emplacement($emplacement);
                                $file_path= 'file_path/'.$emplacement;
                                move_uploaded_file($tmp_name, $file_path);
                                
                            }
                        }
                       
                    
                }else{
                    $error='Veuillez remplir tous les champs!';
                    echo '<div class="alert alert-primary" role="alert">
                    '.$error.'
                  </div>';;
                }
            }
        
        }
        
        $this->_coursupdate_view= new view('Coursupdate');
        $this->_coursupdate_view->generateloading('Coursupdate',array ("cours" => $cours, "contenu" => $contenu));
        
    }
}
?>