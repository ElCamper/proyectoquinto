<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de terrenos agrícolas</title>

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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
                    aria-expanded="true" aria-controls="admin">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administración</span>
                </a>
                <div id="admin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrar:</h6>
                        <a class="collapse-item" href="../Administrador/login.php">Inicio de sesión</a>
                        <a class="collapse-item" href="../Administrador/RegistrarUsuario.php">Registro de usuarios</a>
                        <a class="collapse-item" href="../Administrador/ActualizarUsuario.php">Actualización de usuario</a>
                        <a class="collapse-item" href="../Administrador/EliminarUsuario.php">Eliminación de usuario</a>
                        <a class="collapse-item" href="../Administrador/ConsultarUsuarios.php">Consultar usuarios</a>
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

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#terrenos"
                    aria-expanded="true" aria-controls="terrenos">
                    <i class="fas fa-globe-americas"></i>
                    <span>Datos del terreno</span>
                </a>
                <div id="terrenos" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Terrenos:</h6>
                        <a class="collapse-item active" href="#">Registro de terrenos</a>
                        <a class="collapse-item" href="ActualizarTerreno.php">Actualización de datos <br> de los terrenos</a>
                        <a class="collapse-item" href="EliminarTerreno.php">Eliminación de terrenos <br> registrados</a>
                        <a class="collapse-item" href="ConsultarTerreno.php">Consulta de terrenos <br> registrados</a>
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Anthony Altamirano</span>
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
                            <div class="card-body p-0">

                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Ingreso de datos de terreno agrícola</h1>
                                            </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" disabled id="idTerreno"
                                                            placeholder="ID del terreno">
                                                    </div>
                                                </div>
                                                <hr>
                                                <form class="user navbar-search">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar propietario por cedula"
                                                            aria-label="Search" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <form>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" disabled id="nombre"
                                                            placeholder="Nombre del propietario">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" disabled id="apellido"
                                                            placeholder="Apellido del propietario">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <select id="cultivo" class="form-control form-control-user" aria-label="cultivo">
                                                            <option selected hidden>Seleccionar cultivo</option>
                                                            <option id="maiz" value="maiz">Maíz</option>
                                                            <option id="arroz" value="arroz">Arroz</option>
                                                            <option id="otros" value="otros">Otros</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" id="hectarea" required onkeypress="return ValidarSoloNumero(event)" minlength="1" maxlength="3" required
                                                        placeholder="Numero de hectareas del cultivo seleccionado" onkeyup="calcularHectareas()"> 
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" disabled id="area"
                                                        placeholder="Area (en metros) ocupadas del terreno">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                                        <a href="#" class="btn btn-success btn-icon-split w-50">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text w-100">Registrar terreno</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                                        <a href="../index.php" class="btn btn-danger btn-icon-split w-50">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text w-100">Cancelar registro</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                
                                            
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="background-image: url('https://elproductor.com/wp-content/uploads/2017/03/caracoles-en-arroz.jpg'); background-position: center; background-size: cover;"></div>
                                </div>
                            </div>
                        </div>
                
                    </div>


                    <div class="container">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-4"  style="background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fidi.com.gt%2Fwp-content%2Fuploads%2F2020%2F01%2F2C-1-1.jpg&f=1&nofb=1'); background-position: center; background-size: cover;"></div>
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Lectura de las coordenadas del terreno</h1>
                                            </div>
                                            
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" required disabled id="latitud"
                                                            placeholder="Latitud">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" required disabled id="longitud"
                                                            placeholder="Longitud">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                                        <a onclick="detectar()" class="btn btn-primary btn-icon-split w-50">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-flag"></i>
                                                            </span>
                                                            <span class="text w-100">Detectar coordenada</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                                        <a class="btn btn-warning btn-icon-split w-50" data-target="#advertencia" data-toggle="modal">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-exclamation-triangle"></i>
                                                            </span>
                                                            <span class="text w-100">Des/activar modo manual</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                                        <a onclick="borrarCampos()" class="btn btn-danger btn-icon-split w-50">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text w-100">Borrar coordenadas</span>
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
                                                            <div class="modal-body">Selecione "Continuar" si desea activar o desactivar el modo manual.</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                                                <a onclick="manual()" class="btn btn-success" data-dismiss="modal">Continuar</a>
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
                    <a class="btn btn-primary" href="login.html">Desconectarse</a>
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

    <!-- Codigo para obtener las coordenadas-->
    <script type="text/javascript">
        function calcularHectareas(){
            var valor = document.getElementById("hectarea").value * 1000;
            document.getElementById("area").value = valor;
        }

        function detectar(){
            if (navigator.geolocation) { //Validar si hay acceso web a la ubicación
                navigator.geolocation.getCurrentPosition(mostrarUbicacion); //Obtiene la posición
                } else {
                alert("¡Error! Este navegador no soporta la Geolocalización.");
            }
            
            //Funcion para obtener latitud y longitud
            function mostrarUbicacion(position) {
                var latitud = position.coords.latitude; //Obtener latitud
                var longitud = position.coords.longitude; //Obtener longitud
                document.getElementById("latitud").value = latitud;
                document.getElementById("longitud").value = longitud;
                document.getElementById("idTerreno").value = "LAT"+latitud+"LON"+longitud;
                
            };
            
        }
        function borrarCampos(){
            document.getElementById("latitud").value = "";
            document.getElementById("longitud").value = "";
            document.getElementById("idTerreno").value = "";
        }

        function manual(){
            if(document.getElementById("latitud").disabled == true){
                document.getElementById("latitud").disabled = false;
                document.getElementById("longitud").disabled = false;
            }
            else if(document.getElementById("latitud").disabled == false){
                document.getElementById("latitud").disabled = true;
                document.getElementById("longitud").disabled = true;
            }
            
        }
        	
    </script>

    <script>
	    function ValidarSimple(e) {
            tecla = (document.all) ? e.keyCode : e.which;
    
            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }
        
            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[A-Za-zñÑÁÉÍÓÚáéíóú0-9/.-]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>

    <script>
	    function ValidarContra(e) {
            tecla = (document.all) ? e.keyCode : e.which;
    
            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }
        
            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[A-Za-zñÑ0-9.]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
    
    <script>
        function ValidarSoloNumero(e) {
            tecla = (document.all) ? e.keyCode : e.which;
    
            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }
        
            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
    
    <script>
        function ValidarSoloTexto(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }
        
            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[A-Za-zñÑÁÉÍÓÚáéíóú]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
</body>

</html>