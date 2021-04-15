<?php

include_once('C:/xampp/htdocs/PhpProject1/admin/dist/service/EtudiantService.php');
extract($_GET);

$es = new EtudiantService();
$es->delete($es->findById($id));
header("location:../newStudent.php");


