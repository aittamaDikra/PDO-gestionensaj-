<?php

class Filiere {
    
    public $id;
    public $libelle;
    public $code;
    
    function __construct($id,$code,$libelle){
        $this->id =$id;
        $this->code =$code;
        $this->libelle =$libelle;
    }
    function setId($id){
        $this->id =$id;
            
    }
    function getId(){
        return $this->id;
    }
    function setCode($code){
        $this->code =$code;
            
    }
    function getCode(){
        return $this->code;
    }
    function setLibelle($libelle){
        $this->name =$libelle;
            
    }
    function getLibelle(){
        return $this->libelle;
    }
    
    
}

?>
