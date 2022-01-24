<?php
    include("../conexion.php");
    
    session_start();
    if (empty($_SESSION["correo"])) {
		
		header("Location: ../login.php");
		
		exit();
	}elseif($_SESSION["cargo"] != "administrador"){
        header("Location: ../index.php");
		
		exit();
    }
    

    if($_GET){
        $numero = $_GET["IDEN"];        
        $GLOBALS["numero"] = $numero;
        $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE ID = $numero");
        mysqli_close($conn);

        $result = mysqli_num_rows($sql);
        if($result > 0){
            while ($data = mysqli_fetch_array($sql)) {
                $ID         = $data["ID"];
                $nombre     = $data["nombre"]; 
                $apelllido  = $data["apelllido"]; 
                $cargo      = $data["cargo"]; 
                $telefono   = $data["telefono"]; 
                $correo     = $data["correo"]; 
                $contraseña = $data["contraseña"];
            }
            echo '
            <script>
                function mensaje(){
                    document.getElementById("alertasMensajes").style.display = "block";
                    document.getElementById("alertasMensajes").innerHTML = "Se han encontrado los datos del usuario con ID '.$numero.'";
                    document.getElementById("alertasMensajes").style.backgroundColor = "lightgreen";
                    document.getElementById("alertasMensajes").style.color = "black";
                }
                
            </script>';
        }else{
            echo '
            <script>
                function mensaje(){
                    document.getElementById("alertasMensajes").style.display = "block";
                    document.getElementById("alertasMensajes").innerHTML = "Hubo un error, el usuario con la ID '.$numero.' no existe";
                    document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                    document.getElementById("alertasMensajes").style.color = "white";
                }
            </script>';
        }
    }

    if($_POST){
        if($_POST["idPOST"]){
            include("../conexion.php");
            $idPOST             =   $_POST["idPOST"];
            $sql = "DELETE FROM usuario WHERE ID = '$idPOST'";

            if($conn->query($sql) === true){
                echo '
                <script>
                    function mensaje(){
                        document.getElementById("alertasMensajes").style.display = "block";
                        document.getElementById("alertasMensajes").innerHTML = "Se eliminó al usuario con exito";
                        document.getElementById("alertasMensajes").style.backgroundColor = "lightgreen";
                        document.getElementById("alertasMensajes").style.color = "black";
                    }
                </script>';
            }else{
                echo '
                <script>
                    function mensaje(){
                        document.getElementById("alertasMensajes").style.display = "block";
                        document.getElementById("alertasMensajes").innerHTML = "Hubo un error, no se ha podido realizar la eliminación";
                        document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                        document.getElementById("alertasMensajes").style.color = "white";
                    }
                </script>';
            }
        
            mysqli_close($conn);
        }else{
            echo '
            <script>
                function mensaje(){
                    document.getElementById("alertasMensajes").style.display = "block";
                    document.getElementById("alertasMensajes").innerHTML = "Hubo un error, debe ingresar un ID para realizar la eliminación";
                    document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                    document.getElementById("alertasMensajes").style.color = "white";
                }
            </script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eliminación de usuario</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-superpowers"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ministerio de agricultura </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Resumen</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Páginas
            </div>

            <!-- Nav Item - Administracion -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
                    aria-expanded="true" aria-controls="admin">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administración</span>
                </a>
                <div id="admin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrar:</h6>
                        <a class="collapse-item" href="../login.php">Inicio de sesión</a>
                        <a class="collapse-item" href="RegistrarUsuario.php">Registro de usuarios</a>
                        <a class="collapse-item" href="ActualizarUsuario.php">Actualización de usuario</a>
                        <a class="collapse-item active" href="#">Eliminación de usuario</a>
                        <a class="collapse-item" href="ConsultarUsuarios.php">Consultar usuarios</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#propietario"
                    aria-expanded="true" aria-controls="propietario">
                    <i class="fas fa-address-card"></i>
                    <span>Propietarios</span>
                </a>
                <div id="propietario" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones:</h6>
                        <a class="collapse-item" href="../Propietarios/RegistrarPropietarios.php">Registro de propietarios</a>
                        <a class="collapse-item" href="../Propietarios/ActualizarPropietarios.php">Actualización de <br> propietarios</a>
                        <a class="collapse-item" href="../Propietarios/EliminarPropietarios.php">Eliminación de <br> propietarios</a>
                        <a class="collapse-item" href="../Propietarios/ConsultarPropietarios.php">Consultar propietarios</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#terrenos"
                    aria-expanded="true" aria-controls="terrenos">
                    <i class="fas fa-globe-americas"></i>
                    <span>Datos del terreno</span>
                </a>
                <div id="terrenos" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Terrenos:</h6>
                        <a class="collapse-item" href="../Terrenos/RegistrarTerreno.php">Registro de terrenos</a>
                        <a class="collapse-item" href="../Terrenos/ActualizarTerreno.php">Actualización de datos <br> de los terrenos</a>
                        <a class="collapse-item" href="../Terrenos/EliminarTerreno.php">Eliminación de terrenos <br> registrados</a>
                        <a class="collapse-item" href="../Terrenos/ConsultarTerreno.php">Consulta de terrenos <br> registrados</a>
                    </div>
                </div>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

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

                    <div class="input-group">
                        <?php 
                            ini_set( 'date.timezone', 'America/Lima' );
                            echo "Ecuador, ".fechaC(); 
                            
                            function fechaC(){
                                $mes = array("","Enero", 
                                        "Febrero", 
                                        "Marzo", 
                                        "Abril", 
                                        "Mayo", 
                                        "Junio", 
                                        "Julio", 
                                        "Agosto", 
                                        "Septiembre", 
                                        "Octubre", 
                                        "Noviembre", 
                                        "Diciembre");
                                return date('d')." de ". $mes[date('n')] . " de " . date('Y') . ", " . date('g:i a');
                            }
                        ?>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nombre"]." ".$_SESSION['apelllido']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Opciones
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Registro de actividades
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="container">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                        <div id="alertasMensajes" class="card-header py-2" style="display: none;"></div>
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-4"  style="background-image: url('https://udv.edu.gt/wp-content/uploads/2021/01/%C3%A1reas-laborales-de-un-Ingeniero-Agr%C3%B3nomo.jpg'); background-position: center; background-size: cover;">
                                        <img src="https://cdn.pixabay.com/photo/2011/08/14/18/20/garbage-can-8665_960_720.png" height="100px" width="100px" alt="">
                                    </div>
                                    
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Eliminación de usuario</h1>
                                            </div>
                                            <form method="GET" action="EliminarUsuario.php" class="user navbar-search" autocomplete="off">
                                                <div class="input-group">
                                                    <input required type="text" class="form-control bg-light border-0 small" placeholder="Buscar usuario por ID"
                                                        aria-label="Search" aria-describedby="basic-addon2" value="<?php echo @$numero; ?>" name="IDEN" id="IDEN">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit" name="buscar" id="buscar">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="EliminarUsuario.php" autocomplete="off">
                                                <input type="hidden" name="idPOST" id="idPOST" value="<?php echo @$numero; ?>">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="nombre" id="nombre"
                                                            placeholder="Nombre" disabled value="<?php echo @$nombre; ?>" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" name="apellido" id="apellido"
                                                            placeholder="Apellido" disabled value="<?php echo @$apelllido; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" disabled id="cargo" name="cargo"
                                                            placeholder="Cargo del usuario" value="<?php echo @$cargo; ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" name="telefono" id="telefono"
                                                            placeholder="Telefono" disabled value="<?php echo @$telefono; ?>">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                <input type="email" class="form-control form-control-user" name="correo" id="correo" 
                                                            placeholder="Correo electrónico" disabled value="<?php echo @$correo; ?>">
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                                        <a class="btn btn-success btn-icon-split w-50" data-target="#advertencia" data-toggle="modal">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text w-100">Eliminar usuario</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center ">
                                                        <a href="../index.php" class="btn btn-danger w-50 btn-icon-split" >
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text w-100">Cancelar eliminación</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="advertencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">¡ADVERTENCIA!</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Selecione "Continuar" si realmente desea eliminar a este usuario.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-success" >Continuar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                                
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <span>Copyright &copy; ElCamper 2021</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desea salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Desconectarse" si desea cerrar sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../logout.php">Desconectarse</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script>
        mensaje();
    </script>

</body>

</html>