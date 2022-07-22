<?php
class Cours{
    private $_code_cours;
    private $_nom_cours;
    private $_volume_horaire;
    private $_id_contenu;
    private $_id;
    private $_username;
    private $_titre_contenu;
    private $_emplacement;
    // CONSTRUCTEUR
    public function __construct (array $data){
        $this-> hydrate($data);
    }
    // HYDRATATION
    public function hydrate (array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this,$method)){
                  $this->$method($value);
            }
        }
    }
    // SETTERS
    public function setCode_cours($code_cours){
        $code_cours = (int) $code_cours;
        if ($code_cours > 0){
            $this->_code_cours = $code_cours;
        }

    }
    public function setId($id){
        $id = (int) $id;
        if ($id > 0){
            $this->_id = $id;
        }

    }
    public function setId_contenu($id_contenu){
        $id_contenu = (int) $id_contenu;
        if ($id_contenu > 0){
            $this->_id_contenu = $id_contenu;
        }

    }
    public function setNom_cours($nom_cours){
        if(is_string($nom_cours)){
            $this->_nom_cours = $nom_cours;
        }
    }
    public function setUsername($username){
        if(is_string($username)){
            $this->_username = $username;
        }
    }
    public function setTitre_contenu($titre_contenu){
        if(is_string($titre_contenu)){
            $this->_titre_contenu = $titre_contenu;
        }
    }
    public function setVolume_horaire($volume_horaire){
        $this->_volume_horaire = $volume_horaire;
    }
    public function setEmplacement($emplacement){
        $this->_emplacement = $emplacement;
    }
    // GETTERS
    public function code_cours(){
        return $this->_code_cours;
    }
    public function nom_cours(){
        return $this->_nom_cours;
    }
    public function username(){
        return $this->_username;
    }
    public function volume_horaire(){
        return $this->_volume_horaire;
    }
    public function id_contenu(){
        return $this->_id_contenu;
    }
    public function id(){
        return $this->_id;
    }
    public function titre_contenu(){
        return $this->_titre_contenu;
    }
    public function emplacement(){
        return $this->_emplacement;
    }
}
?>