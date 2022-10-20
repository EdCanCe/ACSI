<?php
include ("conexion.php");

$pass = $_POST["pass"];
$cuenta = $_POST["usuario"];

$insertar = "INSERT INTO cuenta(usuario, pass) VALUES ('$cuenta', '$pass');";

$negado = "SELECT * FROM cuenta where usuario = '$cuenta'";
$querynegado = mysqli_query($conexion, $negado);
if (mysqli_num_rows($querynegado) == 0){
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado) {
        session_start();
        $_SESSION["UsuarioSes"] = $cuenta;
        $_SESSION["PassSes"] = $pass;
        $_SESSION["TipoSes"] = '0';
        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/inicio.php'</script>";
    }else{
       echo "<script>window.location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>';
    </script>";
}
}else{
    echo "<script> window. location='/ACSI/registro_denegado.php?id=Ya se ha creado un usuario con este nombre'</script>";
}