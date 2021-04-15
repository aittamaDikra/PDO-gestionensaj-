<?php
session_start();
include('C:/xampp/htdocs/PhpProject1/admin/dist/connexion/Connexion.php');
$connection = new Connexion();

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}
?>