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

$insertar = "INSERT INTO alumnos(NoControl, CURPAl, NombreAl, ApPaternoAl, ApMaternoAl, TipoSangre, Alergias, NombreTut, ApPaternoTut, ApMaternoTut, NoTelefonoTut, FechaNacAl) VALUES ('$nocontrol', '$curp', '$nombre', '$appaterno', '$apmaterno', '$sangre', '$alergias', '$nombretut', '$appaternotut', '$apmaternotut', '$notel', '$nacimiento');";

$resultado = mysqli_query($conexion, $insertar);
    
if($resultado) {
    echo "<script>alert('Se ha registrado el usuario con éxito');
    window. location='/ACSI/alumno.php?id=" . $nocontrol . "'</script>';</script>";
                                                
}else{
   echo "<script>alert('No se pudo registrar el alumno');
</script>";
}