<?php
include('php-includes/conexion.php');
include('php-includes/check-login.php');
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('./php-pages/sidebar.php'); ?>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <?php include('./php-pages/informacion_usuario.php'); ?>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Begin page content -->

                    <div class="container">
                        <h3 class="mt-5">Gestiona Buses</h3>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <!-- Contenido -->

                                <!-- Content Section -->
                                <!-- crud jquery-->
                                <div class="da">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <button class="btn btn-success" data-toggle="modal"
                                                    data-target="#add_new_record_modal">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="records_content"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Content Section -->

                                <!-- Bootstrap Modals -->
                                <!-- Modal - Add New Record/User -->
                                <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Agregar</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="num_placa">Numero de Placa</label>
                                                    <input type="text" id="num_placa" value="" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="num_bus">Numero de Bus</label>
                                                    <input type="text" id="num_bus" value="" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="num_chasis">Numero de Chasis</label>
                                                    <input type="text" id="num_chasis" class="form-control" value="" />
                                                </div>
                                                 <!-- <div class="form-group">
                                                    <label for="Observacion">Observacion</label>
                                                    <textarea style="text-transform:uppercase" id="obs"
                                                        class="form-control"></textarea>
                                                    <input type="text" id="obs" class="form-control"/>
                                                </div> -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="addRecord()">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Modal -->

                                <!-- Modal - Update User details -->
                                <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Actualizar</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>


                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="idalumno">Cod. Alumno</label>
                                                    <input type="text" id="update_idalumno" value=""
                                                        class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="codalumno">Cod. Alumno</label>
                                                    <input type="text" id="update_codalumno" placeholder="Last Name"
                                                        class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="obs">Observaciones</label>
                                                    <textarea style="text-transform:uppercase" id="update_obs"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="UpdateUserDetails()">Guardar Cambios</button>
                                                <input type="hidden" id="hidden_user_id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Modal -->

                                <!-- Fin crud jquery-->

                                <!-- Fin Contenido -->
                            </div>
                        </div>
                        <!-- Fin row -->

                    </div>
                    <!-- Fin container -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
    <?php include('./php-pages/logoutmodal.php'); ?> 

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Custom JS file for CRUD operations -->
    <script>
    $(document).ready(function(){
        function addRecord(){
            var num_placa = $("#num_placa").val();
            var num_bus = $("#num_bus").val();
            var num_chasis = $("#num_chasis").val();
            
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {
                    'save': 1,
                    'num_placa': num_placa,
                    'num_bus': num_bus,
                    'num_chasis': num_chasis,
                },
                success: function(response){
                    $("#records_content").html(response);
                    $("#add_new_record_modal").modal('hide');
                    $("#form")[0].reset();
                }
            });
        }

        function deleteRecord(id){
            var conf = confirm("¿Estás seguro de eliminar este registro?");
            if(conf == true){
                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: {
                        'delete': 1,
                        'id': id,
                    },
                    success: function(response){
                        $("#records_content").html(response);
                    }
                });
            }
        }

        function getRecords(){
            $.ajax({
                url: 'ajax.php',
                type: 'get',
                data: {
                    'getRecords': 1
                },
                success: function(response){
                    $("#records_content").html(response);
                }
            });
        }

        $(document).on('click', '.delete', function(){
            var id = $(this).attr('data-id');
            deleteRecord(id);
        });

        getRecords();
    });
</script>
</body>
</html>