<?php
include ("conexion.php");
    
}
#----------ANTES DE HACER LA RECETA TENEMOS QUE INICIAR SESION, PARA QUE NO TE TENGA QUE PEDIR EL DOCTOR Y LO TOME DE LA CUENTA ACTUAL

$insertar = "INSERT INTO alumnos(NoControl, CURPAl, NombreAl, ApPaternoAl, ApMaternoAl, TipoSangre, Alergias, NombreTut, ApPaternoTut, ApMaternoTut, NoTelefonoTut, FechaNacAl) VALUES ('$nocontrol', '$curp', '$nombre', '$appaterno', '$apmaterno', '$sangre', '$alergias', '$nombretut', '$appaternotut', '$apmaternotut', '$notel', '$nacimiento');";

$negado = "SELECT * FROM alumnos where NoControl = $nocontrol";
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
