<?php
include('../includes/header.php');
include('../includes/menu.php');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4"> Ajout Etudiant</h3></div>
                                        <div class="card-body">
                                            <form method="GET" action="controller/addEtudiant.php">

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label  class="small mb-1" for="inputLastName">Nom</label>
                                                            <input class="form-control py-4" type="text" name="nom" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputLastName">Prenom </label>
                                                            <input class="form-control py-4" type="text" name="prenom" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputLastName">Ville </label>

                                                            <select class="form-control selcls" name="ville">
                                                                <option value="Marrakech">Marrakech</option>
                                                                <option value="Rabat">Rabat</option>
                                                                <option value="Agadir">Agadir</option>
                                                                <option value="Agadir">El Jadida</option>
                                                                <option value="Agadir">Safi</option>
                                                                <option value="Agadir">Tanger</option>
                                                                

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputLastName">Sexe </label>
                                                            M<input type="radio" name="sexe" value="homme" />
                                                            F<input type="radio" name="sexe" value="femme" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputLastName">classe </label>
                                                            <select class="form-control selcls" name="id_classe">               <?php
                                                                include_once('C:/xampp/htdocs/PhpProject1/admin/dist/service/ClasseService.php');
                                                                $es3 = new ClasseService();
                                                                foreach ($es3->findAll() as $e3) {
                                                                    ?>

                                                                    <option><?php echo $e3->getCode(); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary" id="btn" value="Ajouter" />
                                                            <input type="reset" class="btn btn-primary" value="Effacer" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row justify-content-center">             

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="0"border="1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Ville</th>
                                            <th>Sexe</th>
                                            <th>Classe</th>
                                            <th>Supprimer</th>
                                            <th>Modifier</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('C:/xampp/htdocs/PhpProject1/admin/dist/service//EtudiantService.php');
                                        $es = new EtudiantService();
                                        foreach ($es->findAll() as $e) {
                                            ?>
                                            <tr>
                                                <td><?php echo $e->getId(); ?></td>
                                                <td><?php echo $e->getNom(); ?></td>
                                                <td><?php echo $e->getPrenom(); ?></td>
                                                <td><?php echo $e->getVille(); ?></td>
                                                <td><?php echo $e->getSexe(); ?></td>
                                                <td><?php echo $e->getClasse(); ?></td>
                                                <td>      
                                                    <a href="controller/deleteEtudiant.php?id=
                                                       <?php echo $e->getId(); ?>">Supprimer</a> </td>
                                                <td><a href="controller/updateEtudiant.php?id=<?php echo $e->getId(); ?>  ">Modifier</a></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </main>
                </div>
            </div>
        </div>

        <?php
        include('../includes/script.php');
        include('../includes/footer.php');
        ?>
