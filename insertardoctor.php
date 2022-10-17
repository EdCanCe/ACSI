<?php
include ("conexion.php");

$CedulaProfesional = $_POST["CedulaProfesional"];
$HoraEntrada = $_POST["HoraEntrada"];
$HoraSalida = $_POST["HoraSalida"];
$Egreso = $_POST["Egreso"];
$Especialidad = $_POST["Especialidad"];
$NombreDoc = $_POST["NombreDoc"];
$ApPaDoc = $_POST["ApPaDoc"];
$ApMaDoc = $_POST["ApMaDoc"];

$insertar = "INSERT INTO doctor(CedulaProf, HoraEntrada, HoraSalida, InstitutoEgreso, Especialidad, NombreDoc, ApPaternoDoc, ApMaternoDoc) VALUES ('$CedulaProfesional', '$HoraEntrada', '$HoraSalida', '$Egreso', '$Especialidad', '$NombreDoc', '$ApPaDoc', '$ApMaDoc');";

$negado = "SELECT * FROM doctor where CedulaProf = '$CedulaProfesional'";
$querynegado = mysqli_query($conexion, $negado);
if (mysqli_num_rows($querynegado) == 0){
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado) {
        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/doctor.php?id=" . $CedulaProfesional . "'</script>";
    }else{
       echo "<script>window.location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>';
    </script>";
}
}else{
    echo "<script> window. location='/ACSI/registro_denegado.php?id=No se puede registrar un doctor con una misma cédula profesional    '</script>";
}
