<?php

include_once('C:/xampp/htdocs/PhpProject1/admin/dist/classes/Filiere.php');
include_once('C:/xampp/htdocs/PhpProject1/admin/dist/connexion/Connexion.php');
include_once('C:/xampp/htdocs/PhpProject1/admin/dist/dao/IDao.php');

class FiliereService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO Filiere (`id`, `code`, `libelle`) "
                . "VALUES (NULL,  '" . $o->getCode() . "', 
'" . $o->getLibelle() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from Filiere where id = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds1 = array();
        $query = "select * from Filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e1 = $req->fetch(PDO::FETCH_OBJ)) {
            $etds1[] = new Filiere($e1->id, $e1->code, $e1->libelle);
        }
        return $etds1;
    }

    public function findById($id) {
        $query = "select * from Filiere where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Filiere($e->id, $e->code, $e->libelle);
        }
        return $etd;
    }

    public function getAll() {
        $query = "select * from Filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function f_c() {
        $query = "select count(*),filiere.code from Filiere inner join classe on classe.id_filiere=filiere.code group by filiere.code;";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($o) {
        $query = "UPDATE Filiere SET `libelle` = ?,`code`=? where Filiere.`id` = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(), $o->getCode(), $o->getId())) or die('Error');
    }

}
