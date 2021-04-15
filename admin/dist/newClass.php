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
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4"> Ajout Classe</h3></div>
                                        <div class="card-body">
                                            <form method="POST" >
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label  class="small mb-1" for="inputLastName">Code</label>
                                                            <input class="form-control py-4" type="text" id="id" hidden>
                                                            <br>
                                                            <input class="form-control py-4" type="text" id="codec" name="codec" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputLastName">Filiere </label>
                                                            <select class="form-control selcls" id="id_filierec" name="id_filierec">               <?php
                                                                include('C:/xampp/htdocs/PhpProject1/admin/dist/service/FiliereService.php');
                                                                $es4 = new FiliereService();
                                                                foreach ($es4->findAll() as $e4) {
                                                                    ?>

                                                                    <option><?php echo $e4->getCode(); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary" id="btnc">Ajouter</button>
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>code</th>
                                            <th>filiere</th>
                                            <th>Supprimer</th>
                                            <th>Modifier</th>

                                        </tr>
                                    </thead>
                                    <tbody id="table-content">

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