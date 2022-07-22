<?php
require_once('Views/View.php');
class ControllerCourscontent{
    private $_cours_manager;
    private $_courscontent_view;
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
        $profes = $this->_cours_manager->prof();
        if (isset($_POST['ajout'])){
            if (isset($_FILES['emplacement'])){
                if (!empty($_FILES['emplacement'])){
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
        $this->_courscontent_view= new view('Courscontent');
        $this->_courscontent_view->generate(array ("cours" => $cours, "contenu" => $contenu, "profes" => $profes));
    
        
    }
}

?>