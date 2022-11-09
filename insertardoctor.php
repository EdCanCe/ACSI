<?php
include ("conexion.php");

$CedulaProfesional = $_POST["CedulaProfesional"];
$HoraEntrada = $_POST["HoraEntrada"];
$HoraSalida = $_POST["HoraSalida"];
$Egreso = $_POST["Egreso"];
$Especialidad = $_POST["Especialidad"];
if($Especialidad == "") $Especialidad = "Médico Cirujano";
$NombreDoc = $_POST["NombreDoc"];
$ApPaDoc = $_POST["ApPaDoc"];
$ApMaDoc = $_POST["ApMaDoc"];
$pass = $_POST["Pass"];
$usuario = $_POST["Usuario"];

$insertar = "INSERT INTO Doctor(CedulaProf, HoraEntrada, HoraSalida, InstitutoEgreso, Especialidad, NombreDoc, ApPaternoDoc, ApMaternoDoc) VALUES ('$CedulaProfesional', '$HoraEntrada', '$HoraSalida', '$Egreso', '$Especialidad', '$NombreDoc', '$ApPaDoc', '$ApMaDoc');";

$negado = "SELECT * FROM Doctor where CedulaProf = '$CedulaProfesional'";
$querynegado = mysqli_query($conexion, $negado);
if (mysqli_num_rows($querynegado) == 0){
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado) {
        mysqli_query($conexion, "INSERT INTO Cuenta(Usuario, Pass, TipoCuenta, CedulaDocFK) VALUES ('$usuario', '$pass', 1, '$CedulaProfesional')");
        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/doctor.php?id=" . $CedulaProfesional . "'</script>";
    }else{
       echo "<script>window.location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>';
    </script>";
}
}else{
    echo "<script> window. location='/ACSI/registro_denegado.php?id=No se puede registrar un doctor con una misma cédula profesional    '</script>";
}
