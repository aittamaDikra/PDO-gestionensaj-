<?php
include_once('C:/xampp/htdocs/PhpProject1/admin/dist/service/FiliereService.php');
extract($_GET);

$es = new FiliereService();
$es->f_c();

header("location:../newFiliere.php");
