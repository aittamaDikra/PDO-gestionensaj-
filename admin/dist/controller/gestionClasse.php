<?php


include('C:/xampp/htdocs/PhpProject1/admin/dist/service/ClasseService.php');
extract($_POST);

$ds = new ClasseService();

if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Classe(1, $code, $id_filiere));
    } elseif ($op == 'update') {
        $ds->update(new Classe($id, $code, $id_filiere));
    } elseif ($op == 'delete') {
        $ds->delete($ds->findById($id));
    }
}

header('Content-type: application/json');
echo json_encode($ds->findAll());
