<?php

include_once('C:/xampp/htdocs/PhpProject1/admin/dist/classes/Classe.php');
include_once('C:/xampp/htdocs/PhpProject1/admin/dist/connexion/Connexion.php');
include_once('C:/xampp/htdocs/PhpProject1/admin/dist/dao/IDao.php');


class ClasseService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO Classe (`id`, `code`, `id_filiere`) "
                . "VALUES (NULL, '" . $o->getCode() . "', '" . $o->getID_filiere() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from classe where classe.id = " . $o->getId() ;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from classe";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Classe($e->id, $e->code, $e->id_filiere);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from classe where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Classe($e->id, $e->code, $e->id_filiere);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `classe` SET `code` = '" . $o->getCode() . "', `id_filiere` = '" .
                $o->getID_filiere() . "' WHERE `classe`.`id` = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function getAll() {
        $query = "select * from classe";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

}

