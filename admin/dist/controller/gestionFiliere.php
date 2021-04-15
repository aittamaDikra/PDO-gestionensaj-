<?php


include('C:/xampp/htdocs/PhpProject1/admin/dist/service/FiliereService.php');
extract($_POST);

$ds = new FiliereService();

if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Filiere(1, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new Filiere($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($ds->findById($id));
    }
}

header('Content-type: application/json');
echo json_encode($ds->findAll());
