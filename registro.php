<?php
include ("conexion.php");

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$insertar = "INSERT INTO users(username, pass, email) VALUES ('$username', '$password', '$email');";

$negado = "SELECT * FROM users where username = '$username'";
$querynegado = mysqli_query($conexion, $negado);
if (mysqli_num_rows($querynegado) == 0){
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado) {
        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/doctor.php?id=" . $username . "'</script>";
    }else{
       echo "<script>window.location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>';
    </script>";
}
}else{
    echo "<script> window. location='/ACSI/registro_denegado.php?id=No se puede registrar un doctor con una misma cédula profesional    '</script>";
}
