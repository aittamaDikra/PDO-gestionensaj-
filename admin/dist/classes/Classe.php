<?php

class Classe {

    
    function __construct($id,$code,$id_filiere){
        $this->id =$id;
        $this->code =$code;
        $this->id_filiere =$id_filiere;
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
    function setID_filiere($id_filiere){
        $this->id_filiere =$id_filiere;
            
    }
    function getID_filiere(){
        return $this->id_filiere;
    }
}
