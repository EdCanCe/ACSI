<?php
include ("conexion.php");
$id = $_GET["id"];
$nombre = $_POST["nombre"];
$appaterno = $_POST["appaterno"];
$apmaterno = $_POST["apmaterno"];
$nocontrol = $id;
$curp = $_POST["curp"];
$sangre = $_POST["sangre"];
$alergias = $_POST["alergias"];
$nombretut = $_POST["nombretut"];
$appaternotut = $_POST["appaternotut"];
$apmaternotut = $_POST["apmaternotut"];
$notel = $_POST["notel"];
$nacimiento = $_POST["nacimiento"];

$insertar = "UPDATE Alumnos SET CURPAl = '$curp', NombreAl = '$nombre', ApPaternoAl = '$appaterno', ApMaternoAl = '$apmaterno', Alergias = '$alergias', NombreTut = '$nombretut', ApPaternoTut = '$appaternotut', ApMaternoTut = '$apmaternotut', NoTelefonoTut = '$notel', FechaNacAl = '$nacimiento' where NoControl = $nocontrol;";

$negado = "SELECT * FROM Alumnos where NoControl = $nocontrol";
$querynegado = mysqli_query($conexion, $negado);
if (mysqli_num_rows($querynegado) != 0){
    $resultado = mysqli_query($conexion, $insertar);
    if($resultado) {
        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/alumno.php?id=" . $nocontrol . "'</script>";
    }else{
       echo "<script> window. location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>";
}
}else{
    echo "<script> window. location='/ACSI/registro_denegado.php?id=No se puede modificar un alumno que no existe'</script>";
}

#"INSERT INTO alumnos(NoControl, CURPAl, NombreAl, ApPaternoAl, ApMaternoAl, TipoSangre, Alergias, NombreTut, ApPaternoTut, ApMaternoTut, NoTelefonoTut, FechaNacAl) VALUES ('$nocontrol', '$curp', '$nombre', '$appaterno', '$apmaterno', '$sangre', '$alergias', '$nombretut', '$appaternotut', '$apmaternotut', '$notel', '$nacimiento');";