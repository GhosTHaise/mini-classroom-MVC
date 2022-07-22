<?php
require_once('Views/View.php');
class ControllerCoursinsert{
    private $_cours_manager;
    private $_coursinsert_view;
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
        if (isset($_POST['ajout'])){
            if (isset($_POST['titre_contenu']) && isset($_FILES['emplacement']) && isset($_POST['code_cours']) && isset($_POST['nom_cours'])){
                if (!empty($_POST['titre_contenu']) && !empty($_FILES['emplacement']) && !empty($_POST['code_cours']) && !empty($_POST['nom_cours'])){
                    
                       $titre_contenu=$_POST['titre_contenu'];
                       $nom_cours=$_POST['nom_cours'];
                       $code_cours=$_POST['code_cours'];
                           $this->_cours_manager->Insertnew($code_cours,$titre_contenu,$nom_cours);
                       //Pour les fichiers
                       $fileCount= count($_FILES['emplacement']['name']);
                       for($i=0;$i<$fileCount;$i++){

                           $emplacement=$_FILES['emplacement']['name'][$i];
                           $tmp_name=$_FILES['emplacement']['tmp_name'][$i];
                          

                               $this->_cours_manager->Insertfile($titre_contenu,$emplacement,$code_cours);
                           
                           $file_path= 'file_path/'.$emplacement;
                           move_uploaded_file($tmp_name, $file_path);
                           
                       }
                       
                    
                }else{
                    $error='Veuillez remplir tous les champs!';
                    echo '<div class="alert alert-primary" role="alert">
                    '.$error.'
                  </div>';
                }
            }
        
        }
        
        $this->_coursinsert_view= new view('Coursinsert');
        $this->_coursinsert_view->generateloading('Coursinsert',array ("cours" => $cours));
        
    }
}
?>