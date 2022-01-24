<?php
    include("conexion.php");
    @ob_start();
    if($_POST){
        if(!empty($_POST['correo']) && !empty($_POST['contraseña'])){
            $correo = $_POST["correo"];
            $contraseña = $_POST["contraseña"];

            $sql = "SELECT * FROM usuario WHERE correo='$correo' AND contraseña='$contraseña' ";
            $result = $conn->query($sql);
            $row = $result->num_rows;

            if($row > 0){
                session_start();

                $_SESSION["correo"] = $correo;
                $consulta = "SELECT * FROM usuario WHERE correo='$correo'";
                $resultado = mysqli_query($conn, $consulta);
                while($row = mysqli_fetch_array($resultado)){
                    $_SESSION["idusuario"] = $row["ID"];
                    $_SESSION["nombre"] = $row["nombre"];
                    $_SESSION["apelllido"] = $row["apelllido"];
                    $_SESSION["cargo"] = $row["cargo"];
                }
                header("Location:index.php");
            }else{
                echo '
                <script>
                    function mensaje(){
                        document.getElementById("alertasMensajes").style.display = "block";
                        document.getElementById("alertasMensajes").innerHTML = "El correo o contraseña estan incorrectos";
                        document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                        document.getElementById("alertasMensajes").style.color = "white";
                    }
                </script>';
            }
        }else{
            echo '
                <script>
                    function mensaje(){
                        document.getElementById("alertasMensajes").style.display = "block";
                        document.getElementById("alertasMensajes").innerHTML = "No se ha podido iniciar sesión";
                        document.getElementById("alertasMensajes").style.backgroundColor = "#dc143c";
                        document.getElementById("alertasMensajes").style.color = "white";
                    }
                </script>';
        }
    }
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Proyecto - Inicio de sesión</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                <div id="alertasMensajes" class="card-header py-2" style="display: none;"></div>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-size: cover; background-image: url('https://www.redeszone.net/app/uploads-redeszone.net/2020/05/iniciar-sesion-seguridad.jpg'); background-position:center;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inicio de sesión</h1>
                                    </div>
                                    <form method="POST" action="login.php" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="correo" id="correo" aria-describedby="emailHelp"
                                                placeholder="Ingrese la dirección de correo..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="contraseña" id="contraseña" 
                                                placeholder="Contraseña" required>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Iniciar sesión
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        mensaje();
    </script>

</body>

</html>