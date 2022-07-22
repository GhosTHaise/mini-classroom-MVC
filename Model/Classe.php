<?Php
class Classe{
    private $_id_classe;
    private $_niveau;
    public function __construct(array $data)
    {
        $this->hydrate($data);        
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'Set'.ucfirst($key);
            if(method_exists($this,$method))
                $this->$method($value);
        }
    }
    //Nos Setters
    public function SetId_classe($id_classe){
        $id = (int) $id_classe;
        if($id > 0){
            $this->_id_classe = $id;
        }else{
            $this->_id_classe = "#fjddkunnl-cnnk??????";
        }
    }
    public function SetNiveau($niveau){
        if(is_string($niveau) and $niveau != "All"){
            $this->_niveau = $niveau;
        }else{
            $this->_niveau = "-";
        }
    }
    //NOs Getters
    public function id_classe(){
        return $this->_id_classe;
    }
    public function niveau(){
        return $this->_niveau;
    }
}