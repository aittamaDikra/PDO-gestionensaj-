<?php
include('../includes/header.php');
include('../includes/menu.php');
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Acceuil</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Gestion</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Etudiant</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="newStudent.php">ajouter un nouveau etudiant</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Filiere</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="newFiliere.php">ajouter une nouvelle filière</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Classe</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="newClass.php">ajouter une nouvelle classe</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Admin</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="register.php">ajouter un nouveau admin</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Chercher</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="search.php">chercher par filiere</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Statistique</li>
            </ol>
            <div class="row">
                <i class="fas fa-chart-area mr-1"></i>
                <div class="card-body">

                    <canvas id="chart" width="200" height="60"></canvas>
                    <?php
                    /* Database connection settings */
                    $host = 'localhost:3307';
                    $user = 'root';
                    $pass = '';
                    $db = 'school1';
                    $mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);

                    $data1 = '';
                    $data2 = '';

//query to get data from the table
                    $sql = "SELECT count(*) as a ,filiere.libelle as b FROM `classe` INNER JOIN filiere on classe.id_filiere=filiere.code GROUP by filiere.libelle; ";
                    $result = mysqli_query($mysqli, $sql);

                    //loop through the returned data
                    while ($row = mysqli_fetch_array($result)) {

                        $data1 = $data1 . '"' . $row['a'] . '",';
                        $data2 = $data2 . '"' . $row['b'] . '",';
                    }

                    $data1 = trim($data1, ",");
                    $data2 = trim($data2, ",");
                    ?>
                    <script>
                        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                        Chart.defaults.global.defaultFontColor = '#292b2c';
                        var ctx = document.getElementById("chart").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [<?php echo $data2; ?>],
                                datasets:
                                        [{
                                                label: 'Nombre de classe par filière',
                                                data: [<?php echo $data1; ?>],
                                                backgroundColor: "rgba(2,117,216,1)",
                                                borderColor: "rgba(2,117,216,1)",
                                                borderWidth: 3
                                            },
                                        ]
                            },

                            options: {
                                scales: {xAxes: [{time: {unit: 'filiere'}, gridLines: {display: false}, ticks: {maxTicksLimit: 6}}],
                                    yAxes: [{ticks: {min: 0, max: 10, maxTicksLimit: 10}, gridLines: {display: true}}], },
                                tooltips: {mode: 'index'},

                            }
                        });
                    </script>
                </div>

            </div>
             <div class="row">
                <i class="fas fa-chart-area mr-1"></i>
                <div class="card-body">

                    <canvas id="mychart" width="200" height="60"></canvas>
                </div>
                </div>
                    
            

        </div>



</main>
    




<?php
include('../includes/script.php');
include('../includes/footer.php');
?>


