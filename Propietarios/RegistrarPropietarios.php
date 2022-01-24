<?php
    include("../conexion.php");
    session_start();
    if (empty($_SESSION["correo"])) {
		
		header("Location: ../login.php");
		
		exit();
	}

    if($_POST){                                           

        $validador  =   $_POST["validador"];
        $cedula     =   $_POST["cedula"];
        $nacimiento =   $_POST["nacimiento"];
        $nombre1    =   $_POST["nombre1"];
        $nombre2    =   $_POST["nombre2"];
        $apellido1  =   $_POST["apellido1"];
        $apellido2  =   $_POST["apellido2"];
        $telefono   =   $_POST["telefono"];
        $correoPro  =   $_POST["correoPro"];
        $idusuario  =   $_SESSION["idusuario"];


        if($validador != "correcto"){
            echo '
                <script>
                    function mensaje(){
                        document.getElementById("alertasMensajes").style.display = "block";
                        document.getElementById("alertasMensajes").innerHTML = "Por favor, ingrese una cedula correcta antes de continuar con el registro";
                        document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                        document.getElementById("alertasMensajes").style.color = "white";
                        document.getElementById("validador").value  = "'.$validador.'";
                        document.getElementById("cedula").value     = "'.$cedula.'";
                        document.getElementById("nacimiento").value = "'.$nacimiento.'";
                        document.getElementById("nombre1").value    = "'.$nombre1.'";
                        document.getElementById("nombre2").value    = "'.$nombre2.'";
                        document.getElementById("apellido1").value  = "'.$apellido1.'";
                        document.getElementById("apellido2").value  = "'.$apellido2.'";
                        document.getElementById("telefono").value   = "'.$telefono.'";
                        document.getElementById("correoPro").value  = "'.$correoPro.'";
                    }
                </script>';
        }else{
            $consulta = "SELECT * FROM propietario WHERE cedula='$cedula'";
            $result = $conn->query($consulta);
            $row = $result->num_rows;
            if($row > 0){
                echo '
                    <script>
                        function mensaje(){
                            document.getElementById("alertasMensajes").style.display = "block";
                            document.getElementById("alertasMensajes").innerHTML = "El propietario con la cedula de identidad '.$cedula.' ya está registrado";
                            document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                            document.getElementById("alertasMensajes").style.color = "white";
                            document.getElementById("validador").value  = "'.$validador.'";
                            document.getElementById("nacimiento").value = "'.$nacimiento.'";
                            document.getElementById("nombre1").value    = "'.$nombre1.'";
                            document.getElementById("nombre2").value    = "'.$nombre2.'";
                            document.getElementById("apellido1").value  = "'.$apellido1.'";
                            document.getElementById("apellido2").value  = "'.$apellido2.'";
                            document.getElementById("telefono").value   = "'.$telefono.'";
                            document.getElementById("correoPro").value  = "'.$correoPro.'";
                        }
                    </script>';
            }else{
                $sql = "INSERT INTO propietario VALUES('$cedula', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$nacimiento', '$telefono', '$correoPro', '$idusuario')";

                if($conn->query($sql) === true){
                    echo '
                    <script>
                        function mensaje(){
                            document.getElementById("alertasMensajes").style.display = "block";
                            document.getElementById("alertasMensajes").innerHTML = "Se ha registrado un nuevo propietario con exito";
                            document.getElementById("alertasMensajes").style.backgroundColor = "lightgreen";
                            document.getElementById("alertasMensajes").style.color = "black";
                        }
                    </script>';
                }else{
                    echo '
                    <script>
                        function mensaje(){
                            document.getElementById("alertasMensajes").style.display = "block";
                            document.getElementById("alertasMensajes").innerHTML = "Hubo un error, no se ha podido registrar al propietario nuevo";
                            document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                            document.getElementById("alertasMensajes").style.color = "white";
                        }
                    </script>';
                }
            }
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

    <title>Proyecto - Ingreso de propietario</title>

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
                        <a class="collapse-item" href="../login.php">Inicio de sesión</a>
                        <a class="collapse-item" href="../Administrador/RegistrarUsuario.php">Registro de usuarios</a>
                        <a class="collapse-item" href="../Administrador/ActualizarUsuario.php">Actualización de usuario</a>
                        <a class="collapse-item" href="../Administrador/EliminarUsuario.php">Eliminación de usuario</a>
                        <a class="collapse-item" href="../Administrador/ConsultarUsuarios.php">Consultar usuarios</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#propietario"
                    aria-expanded="true" aria-controls="propietario">
                    <i class="fas fa-address-card"></i>
                    <span>Propietarios</span>
                </a>
                <div id="propietario" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones:</h6>
                        <a class="collapse-item active" href="#">Registro de propietarios</a>
                        <a class="collapse-item" href="ActualizarPropietarios.php">Actualización de <br> propietarios</a>
                        <a class="collapse-item" href="EliminarPropietarios.php">Eliminación de <br> propietarios</a>
                        <a class="collapse-item" href="ConsultarPropietarios.php">Consultar propietarios</a>
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

                            function fechaMaximo(){
                                $maximus = (date('Y')-18)."-".date('m')."-".date('d');
                                return $maximus;
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
                                    
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Registro de propietarios de terrenos agricolas</h1>
                                            </div>
                                            <form method="POST" action="RegistrarPropietarios.php" autocomplete="off">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="cedula" id="cedula" onkeyup="validar()" onkeypress="return ValidarSoloNumero(event)" minlength="10" maxlength="10" required
                                                            placeholder="Cedula de identidad">
                                                        <p class="text-center my-0 pt-1" id="mensajeContra" style="display: none;"></p>
                                                        <input type="hidden" id="validador" name="validador">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="date" class="form-control form-control-user" name="nacimiento" id="nacimiento" required max="<?php echo fechaMaximo(); ?>"
                                                            placeholder="Fecha de nacimiento">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="nombre1" id="nombre1" onkeypress="return ValidarSoloTexto(event)" minlength="2" maxlength="25" required
                                                            placeholder="Primer nombre">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" name="nombre2" id="nombre2" onkeypress="return ValidarSoloTexto(event)" minlength="2" maxlength="25" required
                                                            placeholder="Segundo nombre">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="apellido1" id="apellido1" onkeypress="return ValidarSoloTexto(event)" minlength="2" maxlength="25" required
                                                            placeholder="Primer apellido">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" name="apellido2" id="apellido2" onkeypress="return ValidarSoloTexto(event)" minlength="2" maxlength="25" required
                                                            placeholder="Segundo apellido">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" name="telefono" id="telefono" onkeypress="return ValidarSoloNumero(event)" minlength="10" maxlength="10" required
                                                        placeholder="Telefono">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control form-control-user" name="correoPro" id="correoPro" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,4}" maxlength="70" required
                                                        placeholder="Correo electrónico">
                                                    </div>
                                                </div>
                                                <hr>
                                                
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                                        <button type="submit" class="btn btn-success btn-icon-split w-50">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span class="text w-100">Registrar propietario</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 text-center ">
                                                        <a href="../index.php" class="btn btn-danger w-50 btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text w-100">Cancelar registro</span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </form>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4"  style="background-image: url('https://preferredbynature.org/sites/default/files/inline-images/Indonesia%20Rice%20project.jpg'); background-position: center; background-size: cover;"></div>
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

    <script>
        function validar(){
            $(function(){

            /**
             * Algoritmo para validar cedulas de Ecuador
             * @Author : Victor Diaz De La Gasca.
             * @Fecha  : Quito, 15 de Marzo del 2013 
             * @Email  : vicmandlagasca@gmail.com
             * @Pasos  del algoritmo
             * 1.- Se debe validar que tenga 10 numeros
             * 2.- Se extrae los dos primero digitos de la izquierda y compruebo que existan las regiones
             * 3.- Extraigo el ultimo digito de la cedula
             * 4.- Extraigo Todos los pares y los sumo
             * 5.- Extraigo Los impares los multiplico x 2 si el numero resultante es mayor a 9 le restamos 9 al resultante
             * 6.- Extraigo el primer Digito de la suma (sumaPares + sumaImpares)
             * 7.- Conseguimos la decena inmediata del digito extraido del paso 6 (digito + 1) * 10
             * 8.- restamos la decena inmediata - suma / si la suma nos resulta 10, el decimo digito es cero
             * 9.- Paso 9 Comparamos el digito resultante con el ultimo digito de la cedula si son iguales todo OK sino existe error.     
             */
                
                var cedula = document.getElementById("cedula").value;

                //Preguntamos si la cedula consta de 10 digitos
                if(cedula.length == 10){
                
                    //Obtenemos el digito de la region que sonlos dos primeros digitos
                    var digito_region = cedula.substring(0,2);
                    
                    //Pregunto si la region existe ecuador se divide en 24 regiones
                    if( digito_region >= 1 && digito_region <=24 ){
                        
                        // Extraigo el ultimo digito
                        var ultimo_digito   = cedula.substring(9,10);

                        //Agrupo todos los pares y los sumo
                        var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));

                        //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
                        var numero1 = cedula.substring(0,1);
                        var numero1 = (numero1 * 2);
                        if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

                        var numero3 = cedula.substring(2,3);
                        var numero3 = (numero3 * 2);
                        if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

                        var numero5 = cedula.substring(4,5);
                        var numero5 = (numero5 * 2);
                        if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

                        var numero7 = cedula.substring(6,7);
                        var numero7 = (numero7 * 2);
                        if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

                        var numero9 = cedula.substring(8,9);
                        var numero9 = (numero9 * 2);
                        if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

                        var impares = numero1 + numero3 + numero5 + numero7 + numero9;

                        //Suma total
                        var suma_total = (pares + impares);

                        //extraemos el primero digito
                        var primer_digito_suma = String(suma_total).substring(0,1);

                        //Obtenemos la decena inmediata
                        var decena = (parseInt(primer_digito_suma) + 1)  * 10;

                        //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
                        var digito_validador = decena - suma_total;

                        //Si el digito validador es = a 10 toma el valor de 0
                        if(digito_validador == 10)
                        var digito_validador = 0;

                        //Validamos que el digito validador sea igual al de la cedula
                        if(digito_validador == ultimo_digito){
                        var input = document.getElementById('cedula');
                        
                        if (!input.checkValidity()) {
                            document.getElementById("mensajeContra").innerHTML = "Input NOTOK";
                        } else {
                            if(document.getElementById("cedula").value == 2222222222){
                                document.getElementById('mensajeContra').style.display = "block";
                                document.getElementById("mensajeContra").innerHTML = "Error 1: La cedula esta incorrecta o no existe";
                                document.getElementById("mensajeContra").style.color = "red";
                                document.getElementById("validador").value="incorrecto";
                            }else{
                                document.getElementById('mensajeContra').style.display = "block";
                                document.getElementById("mensajeContra").innerHTML = "La cedula es correcta";
                                document.getElementById("mensajeContra").style.color = "lightgreen";
                                document.getElementById("validador").value="correcto";
                            }
                            
                        } 
                        
                        console.log('la cedula:' + cedula + ' es correcta');
                        }else{
                        
                        var input = document.getElementById('cedula');
                        
                        if (!input.checkValidity()) {
                            document.getElementById("mensajeContra").innerHTML = "Error1";
                        } else {
                            document.getElementById('mensajeContra').style.display = "block";
                            document.getElementById("mensajeContra").innerHTML = "Error 1: La cedula esta incorrecta o no existe";
                            document.getElementById("mensajeContra").style.color = "red";
                            document.getElementById("validador").value="incorrecto";
                        }           
                        console.log('la cedula:' + cedula + ' es incorrecta');
                        }
                        
                    }else{
                        // imprimimos en consola si la region no pertenece
                        var input = document.getElementById('cedula');
                        
                        if (!input.checkValidity()) {
                            document.getElementById("mensajeContra").innerHTML = "Error2";
                        } else {
                            document.getElementById('mensajeContra').style.display = "block";
                            document.getElementById("mensajeContra").innerHTML = "Error 2: La cedula no pertenece a ninguna región";
                            document.getElementById("mensajeContra").style.color = "red";
                            document.getElementById("validador").value="incorrecto";
                        }   
                        console.log('Esta cedula no pertenece a ninguna region');
                    }
                    }/*else{
                    //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
                    var input = document.getElementById('cedula');
                        
                        if (!input.checkValidity()) {
                            document.getElementById('mensajeContra').style.display = "block";
                            document.getElementById("mensajeContra").innerHTML = "Error 3: La cedula no tiene los 10 digitos";
                            document.getElementById("mensajeContra").style.color = "red";
                        } else {
                            document.getElementById("mensajeContra").innerHTML = "Error 3: La cedula no tiene los 10 digitos";
                            document.getElementById("mensajeContra").style.color = "red";;
                        } 
                    console.log('Esta cedula tiene menos de 10 Digitos');
                    } */   

                });
                if(document.getElementById("cedula").value.length <=9){
                    document.getElementById('mensajeContra').style.display = "none";
                }
            }
    </script>
    <script>
        mensaje();
    </script>

</body>

</html>