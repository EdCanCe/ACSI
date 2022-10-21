<?php
include ("conexion.php");
session_start();

#----------ANTES DE HACER LA RECETA TENEMOS QUE INICIAR SESION, PARA QUE NO TE TENGA QUE PEDIR EL DOCTOR Y LO TOME DE LA CUENTA ACTUAL

$usuario = $_SESSION["UsuarioSes"];
$resultado = mysqli_query($conexion, "SELECT CedulaDocFK FROM cuenta where Usuario = '$usuario'");
while($row=mysqli_fetch_assoc($resultado)) {
    $cedula = $row["CedulaDocFK"];
}

$noControl = $_POST["NoControlFK"];
$padecimientos = $_POST["Padecimientos"];
$diagnostico = $_POST["Diagnostico"];
$dosis = $_POST["Tratamiento"];
$temperatura = $_POST["Temperatura"];
$peso = $_POST["Peso"];
$altura = $_POST["Altura"];
date_default_timezone_set('America/Mexico_City');
$fecha = date('y-m-d h:i:s');

$medicinasRaw = $_POST["Cantidad"];

$insertar = "INSERT INTO receta(NoControlFK, CedulaProfFK, Padecimientos, Diagnostico, Dosis, TempPaciente, PesoPaciente, Altura, Fecha) VALUES ('$noControl', '$cedula', '$padecimientos', '$diagnostico', '$dosis', '$temperatura', '$peso', '$altura', '$fecha');";

$resultado = mysqli_query($conexion, $insertar);
if($resultado) {
    $idreceta = "";
    $resultado2 = mysqli_query($conexion, "SELECT * from receta where CedulaProfFK = '$cedula' and Fecha = '$fecha'");
    while($row=mysqli_fetch_assoc($resultado2)) {
        $idreceta = $row["NoConsulta"];
    }
    #esta partecita no charchó, ya jala la madre de consultas, ahora es sacar las meds
    if($medicinasRaw != ""){
        $aKeyword = explode(" ", $medicinasRaw);
        for($i = 1; $i < count($aKeyword); $i++){
            if(!empty($aKeyword[$i])){
                
                $bKeyword = explode("-", $aKeyword[$i]);
                
                $medId = "";
                $resultado2 = mysqli_query($conexion, "SELECT MedicinaID from medicina where NombreMed = '$bKeyword[0]'");
                if(mysqli_num_rows($resultado2) > 0 ){
                    while($row=mysqli_fetch_assoc($resultado2)) {
                        $medId = $row["MedicinaID"];
                    }
                }else{
                    echo "<script> window. location='/ACSI/registro_denegado.php?id=No existe esa medicina en la lista</script>";
                }
                $resultado2 = mysqli_query($conexion, "INSERT INTO cantidadesmed(Cantidad, MedicinaIDFK, NoConsultaFK) VALUES ('$bKeyword[1]', '$medId', '$idreceta')");
                
            }
        }
    }
    
    echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/consulta.php?id=" . $idreceta . "'</script>";
}else{
   echo "<script> window. location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>";
}
