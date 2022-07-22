<?php 
class LoginEncrypted{
    private $_id;
    private $_username;
    private $_statut;
    private $_email;
    private $_photo_profil;
    public function __construct(array $data){
         $this->hydrate($data);
    }
    //verifier et Remplir automatiquement avec les setter -> obj -> array -> data;
    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'Set'.ucfirst($key);
            if(method_exists($this,$method))
                $this->$method($value);
        }
    }
    //Nos Setter;
    public function SetId($id){
        $id = (int) $id;
        if($id > 0){
            $this->_id = $id;
        }
    }
    public function SetNiveau($niveau){
        if(is_string($niveau)){
            $this->_niveau = $niveau;
        }
    }

    public function SetUsername($username){
        if(is_string($username)){
            $this->_username = $username;
        }
    }
    public function SetStatut($statut){
        //Admin - Etudiant - Prof
        if($statut == 7381 or $statut == 1111 or $statut == 2222){
            if($statut == 2222){
                $this->_statut = "#2f2ab4sprofsfpf22";
            }else if($statut == 7381) {
                $this->_statut = "#7f3ab4sadminfad81";
            }else{
                $this->_statut = "#1f1ab4setudifad11";
            }
        }else{
            $this->_statut = "invalide";
        }
    }
    public function SetEmail($email){
          if(is_string($email) and stripos($email,"@") !== false){
              $this->_email = $email;
          }else{
            return "Email non-valide";
          }     
    }
    public function SetPhoto_profil($photo_profil){
        if(is_string($photo_profil)){
            $this->_photo_profil = $photo_profil;
        }
    }

    //Nos getter -> recuperation variable privee XD;
    public function id(){
        return $this->_id;
    }
    public function username(){
        return $this->_username;
    }
    public function statut(){
        return $this->_statut;
    }
    public function email(){
        return $this->_email;
    }
    public function photo_profil(){
        return $this->_photo_profil;
    }

}