<?php
Class View
{
    private $_file;
    private $_t;
    public function __construct(STRING $action)
    {
        $this->_file = "Views/View".ucfirst(strtolower($action)).".php";
    }
    //Genere en deux parties pour plus de securite... XD et affiche la vue ;
    public function generate(ARRAY $data){
        //Partie specifique |  unique de de chaque vue -> donnee;
        $content = $this->generateFile($this->_file,$data);
        //Partie commun a chaque vue;
        $view = $this->generateFile("Views/template.php",array("t" => $this->_t,"content" => $content));
        echo $view;
    }
    public function generateloading($loading,array $data){
        $view = $this->generateFile("Views/View".$loading.".php",$data);
        echo $view;
    }
    //Nous allons generer le fichier vue et l'envoyer;
    
    private function generateFile($file,$data){
        if(file_exists($file)){
            extract($data);
            //mise en tampon -> temporisation;
            ob_start();
            // Si le fichier view existe -> On va le requerir;
            require $file;
            return ob_get_clean();
            //stop
        }else{
            throw new Exception("Fichier : ".$file." Introuvable");
            die();
        }
    }
}