<?php
include ('php-includes/conexion.php');
include ('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$search = $userid;
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
    <!-- Custom scripts for this page -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('read_uid_btn').addEventListener('click', function() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_last_uid.php', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById('uid').value = xhr.responseText;
                    } else {
                        console.error('Error al obtener el UID:', xhr.statusText);
                    }
                };
                xhr.send();
            });
        });
    </script>
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
                    <h3 class="mt-5">Vender tarjeta</h3>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <!-- Contenido -->
                            <!-- Content Section -->
                            <!-- crud jquery-->
                            <div class="da">
                                <form id="add_record_form" action="record.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="uid">UID</label>
                                                <input type="text" id="uid" name="uid" class="form-control" required
                                                    readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="ci_usuario">CI Usuario</label>
                                                <input type="text" id="ci_usuario" name="ci_usuario"
                                                    class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" id="nombre" name="nombre" class="form-control"
                                                    required />
                                            </div>
                                            <div class="form-group">
                                                <label for="ape_paterno">Apellido Paterno</label>
                                                <input type="text" id="ape_paterno" name="ape_paterno"
                                                    class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="ape_materno">Apellido Materno</label>
                                                <input type="text" id="ape_materno" name="ape_materno"
                                                    class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo_tarjeta">Tipo de Tarjeta</label>
                                                <input type="text" id="tipo_tarjeta" name="tipo_tarjeta"
                                                    class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="saldo">Saldo</label>
                                                <input type="text" id="saldo" name="saldo" class="form-control"
                                                    required />
                                            </div>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                            <button type="button" id="read_uid_btn" class="btn btn-secondary">Leer UID
                                                de Tarjeta</button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="records_content"></div>
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

    <script src="js/nfc_reader.js"></script>

    <!-- Custom scripts for CRUD operations -->
    <script>
        $(document).ready(function () {
            readRecords(); // Initial call to load records
        });

        function readRecords() {
            $.get("read_records.php", function (data) {
                $("#records_content").html(data);
            });
        }
    </script>

</body>

</html>