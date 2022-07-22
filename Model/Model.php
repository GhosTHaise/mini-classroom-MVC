<?php
require_once "Account.php";
abstract class Model{
    private static $_bdd;
    //Creer une instance a la base de donne;
    private static function SetBdd(){
        self::$_bdd = new PDO("mysql:host=localhost;dbname=Supremacy_InfoProject","GhosT","Sambatra");
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    //Recuperer la Connexion a la base de donnee;
    protected function getBdd(){
         if(self::$_bdd == null){
            self::SetBdd();
        }
         return self::$_bdd;
    }
    //Recuperer tout les donnes de la table
    protected function getAll(STRING $colomn,STRING $table,STRING $obj,STRING $condition,ARRAY $execRequest){
        $var = [];
        $req = $this->getBdd()->prepare('SELECT '.$colomn.' FROM '.$table.' '.$condition);
        $req->execute($execRequest);
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
    //Supprimer un Element d'une table
    protected function Delete(STRING $table,STRING $condition){
        $req = $this->getBdd()->prepare('DELETE FROM '.$table.' '.$condition);
        $req->execute();
        $req->closeCursor();
    }

    //Verifier un Element
    protected function searchValue($searchValue){
        if(isset($searchValue)){
            return $searchValue;
        }
        else{
            return ' ';
        }
    }
    //Inserer un element dans une table
    protected function Insert(STRING $table,STRING $colomn,STRING $values){
        $req = $this->getBdd()->prepare("INSERT INTO ".$table." (".$colomn.") VALUES (".$values.")");
        $req->execute();
        $req->closeCursor();
    }
    //Modifier un element de la table
    protected function Update(STRING $table,STRING $values,STRING $condition,ARRAY $execRequest){
        $req = $this->getBdd()->prepare('UPDATE '.$table.' SET '.$values.' WHERE '.$condition);
        $req->execute($execRequest);
        $req->closeCursor();
    }
    protected function Removebaby(STRING $table, STRING $condition){
        $req = $this->getBdd()->prepare("DELETE FROM ".$table." ".$condition);
        $req->execute();
        $req->closeCursor();
    }
    protected function Insertbaby(STRING $table,STRING $colomn,STRING $values){
        $req = $this->getBdd()->prepare("INSERT INTO ".$table." (" .$colomn. ") VALUES (".$values.")");
        $req->execute();
        $req->closeCursor();
    }
    protected function getAll2(STRING $table,STRING $obj,STRING $condition){
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' '.$condition);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
    //Autoriser une instance
    public function Allowed(){
        
    }
    
}