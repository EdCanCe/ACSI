<?php
$username=$_POST['usuario'];
$password=$_POST['pass'];
session_start();

include('conexion.php');

$consulta="SELECT * FROM cuenta where usuario='$username' and pass='$password'";
$resultado=mysqli_query($conexion, $consulta);

if(mysqli_num_rows($resultado) == 0){
    echo "<script> window. location='/ACSI/registro_denegado.php?id=Cuenta o contraseña incorrectos'</script>";
}else{
    while($row=mysqli_fetch_assoc($resultado)) {
        $_SESSION["TipoSes"] = '$row["TipoCuenta"]';
    }
    $_SESSION["UsuarioSes"] = $username;
    $_SESSION["PassSes"] = $password;
    echo "<script> window. location='/ACSI/inicio.php'</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
