<?php
include ("conexion.php");

$nombre = $_POST["nombre"];
$appaterno = $_POST["appaterno"];
$apmaterno = $_POST["apmaterno"];
$nocontrol = $_POST["nocontrol"];
$curp = $_POST["curp"];
$sangre = $_POST["sangre"];
$alergias = $_POST["alergias"];
$nombretut = $_POST["nombretut"];
$appaternotut = $_POST["appaternotut"];
$apmaternotut = $_POST["apmaternotut"];
$notel = $_POST["notel"];
$nacimiento = $_POST["nacimiento"];

$insertar = "INSERT INTO Alumnos(NoControl, CURPAl, NombreAl, ApPaternoAl, ApMaternoAl, TipoSangre, Alergias, NombreTut, ApPaternoTut, ApMaternoTut, NoTelefonoTut, FechaNacAl) VALUES ('$nocontrol', '$curp', '$nombre', '$appaterno', '$apmaterno', '$sangre', '$alergias', '$nombretut', '$appaternotut', '$apmaternotut', '$notel', '$nacimiento');";

$negado = "SELECT * FROM Alumnos where NoControl = $nocontrol";
$querynegado = mysqli_query($conexion, $negado);
if (mysqli_num_rows($querynegado) == 0){
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado) {
        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/alumno.php?id=" . $nocontrol . "'</script>";
    }else{
       echo "<script> window. location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>";
}
}else{
    echo "<script> window. location='/ACSI/registro_denegado.php?id=No se puede registrar nuevamente un alumno que ya existe'</script>";
}
