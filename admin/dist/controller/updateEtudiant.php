<?php
include_once('C:/xampp/htdocs/PhpProject1/admin/dist/service/EtudiantService.php');
extract($_GET);


$es = new EtudiantService();
$es->findById($id);

header("location:../index.php");


