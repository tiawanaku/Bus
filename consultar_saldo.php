<?php
include ('php-includes/conexion.php');
include ('php-includes/check-login.php');
$userid = $_SESSION['userid'];

// Obtener la fecha actual
$currentDate = date('Y-m-d');

// Consulta SQL para contar boletos de la fecha actual
$query = "SELECT uid FROM boletos_validos WHERE fecha LIKE '$currentDate%'";

// Ejecutar la consulta
$result = mysqli_query($con, $query);

// Contar los boletos
$totalBoletos = mysqli_num_rows($result);

// Consulta SQL para contar boletos regulares y preferenciales
$regularesQuery = "SELECT COUNT(*) AS count FROM boletos_validos WHERE uid LIKE '469471A594880' AND fecha LIKE '$currentDate%'";
$preferencialesQuery = "SELECT COUNT(*) AS count FROM boletos_validos WHERE uid LIKE 'A2151F51' AND fecha LIKE '$currentDate%'";

$regularesResult = mysqli_query($con, $regularesQuery);
$preferencialesResult = mysqli_query($con, $preferencialesQuery);

$regularesCount = mysqli_fetch_assoc($regularesResult)['count'];
$preferencialesCount = mysqli_fetch_assoc($preferencialesResult)['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema Bus Municipal - Bus</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include ('./php-pages/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <?php include ('./php-pages/informacion_usuario.php'); ?>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h3 class="mt-5">Contador de Boletos</h3>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <!-- Contenido -->
                            <!-- Content Section -->
                            <div class="da">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha_actual">Fecha Actual</label>
                                            <input type="text" id="fecha_actual" class="form-control" value="<?php echo $currentDate; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_boletos">Total Boletos</label>
                                            <input type="text" id="total_boletos" class="form-control" value="<?php echo $totalBoletos; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="boletos_regulares">Boletos Regulares</label>
                                            <input type="text" id="boletos_regulares" class="form-control" value="<?php echo $regularesCount; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="boletos_preferenciales">Boletos Preferenciales</label>
                                            <input type="text" id="boletos_preferenciales" class="form-control" value="<?php echo $preferencialesCount; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Content Section -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bus Municipal 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include ('./php-pages/logoutmodal.php'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
