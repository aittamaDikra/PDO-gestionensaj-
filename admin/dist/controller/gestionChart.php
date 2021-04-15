<?php

include_once('C:/xampp/htdocs/PhpProject1/admin/dist/service/FiliereService.php');
$es = new FiliereService();
$es->f_c();

$data1 = '';
$data2 = '';

while ($row = mysqli_fetch_array($result)) {

    $data1 = $data1 . '"' . $row['a'] . '",';
    $data2 = $data2 . '"' . $row['b'] . '",';
}

$data1 = trim($data1, ",");
$data2 = trim($data2, ",");
