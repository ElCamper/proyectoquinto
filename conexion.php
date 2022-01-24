<?php
    $servername = 'localhost';
    $username   = 'root';
    $password   = '';
    $database   = 'proyectoquinto';

    $conn = @mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
    echo '
    <script>
        document.getElementById("alertasMensajes").style.display = "block"
        document.getElementById("alertasMensajes").innerHTML = "Hubo un error en la conexion banda"
    </script>';
    }
?>