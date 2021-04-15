<?php
include_once('../includes/header.php');
include('../includes/menu.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">

            <?php include_once ('connexion/Connexion.php'); ?>
            <form method='post'>
                <br>
                <select class="form-control selcls" name="recherche_valeur">               <?php
            include('C:/xampp/htdocs/PhpProject1/admin/dist/service/FiliereService.php');
            $es4 = new FiliereService();
            foreach ($es4->findAll() as $e4) {
                ?>

                        <option><?php echo $e4->getCode(); ?></option>
                    <?php } ?>
                </select>
                <input type='submit' class="btn btn-primary" value="Rechercher"/>
            </form>
            <br>
            <div class="row justify-content-center">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="0"border="1">
                <thead>
                    <tr><th>Id</th><th>Classe</th><th>filiere</th>
                </thead>
                <tbody>
                    <?php
                    $connect = new Connexion();
                    $sql = 'select classe.id, classe.code, classe.id_filiere from classe inner join filiere on classe.id_filiere=Filiere.code ';
                    $params = [];
                    if (isset($_POST['recherche_valeur'])) {
                        $sql .= ' where classe.id_filiere like :id_filiere;';
                        $params[':id_filiere'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
                    }
                    $resultats = $connect->getConnexion()->prepare($sql);
                    $resultats->execute($params);
                    if ($resultats->rowCount() > 0) {
                        while ($d = $resultats->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr><td><?= $d['id'] ?></td><td><?= $d['code'] ?></td><td><?= $d['id_filiere'] ?></td></tr>
                            <?php
                        }
                        $resultats->closeCursor();
                    } else {
                        echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>' .
                        $connect = null;
                    }
                    ?>
                </tbody>
            </table>
                      </div>
  
        </div>
    <?php
    include('../includes/script.php');
    include('../includes/footer.php');
    ?>
