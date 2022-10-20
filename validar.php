<?php
$username=$_POST['usuario'];
$password=$_POST['pass'];
session_start();

include('conexion.php');

$consulta="SELECT * FROM users where username='$username' and pass='$password'";
$resultado=mysqli_query($conexion, $consulta);

if(mysqli_num_rows($resultado) == 0){
    echo "<script> window. location='/ACSI/registro_denegado.php?id=Cuenta o contraseña incorrectos'</script>";
}else{
    echo "<script> window. location='/ACSI/inicio.php'</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
