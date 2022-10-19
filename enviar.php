<?php
    include 'conecto.php';

    $nombre = $_POST['name'];     

    $directorio ="add/";
    $archivo = $directorio . basename($_FILES["file"]["name"]);

    $insert = "INSERT INTO archivos(nombre, url, ingreso) VALUES ('$nombre','$archivo',NOW())";
    $result = mysqli_query($conexion,$insert);
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo) && $result) {

        header('Location: index.php');
    } else {
        echo "La accion fallo satisfactoriamente!";
    }
    


?> 