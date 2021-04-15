<?php
include_once('C:/xampp/htdocs/PhpProject1/admin/dist/service/EtudiantService.php');
extract($_GET);

$es = new EtudiantService();
$es->create(new Etudiant(1, $nom, $prenom, $ville, $sexe ,$id_classe));

header("location:../newStudent.php");

