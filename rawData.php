<?php
include("variablesglobales.php");
session_start();
include("conexion.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>rawData</title>
	<meta charset="utf-8">
	<meta name="author" content="Jorge Arturo Salgado Ceja, José Roberto García Correa, Edmundo Canedo Cervantes">
	<meta name="description" content="Sistema para la gestión de enfermería, teniendo elaboración de recetas, vista de historial médico e inventario de medicinas">
	<meta name="keywords" content="enfermería, hora, js, html5, css">
	<link rel="icon" href="imgs/icon.png">
	<script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style> 
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

        *{
            font-family: 'Poppins', sans-serif;
            caret-color: red;
            line-height: 10px;
        }


    </style>
</head>

<body>

	<?php //ESTE HACE EL MENÚ DESPLEGABLE
        $mostrar = '0';
        if(isset($_SESSION["UsuarioSes"])){ //checa si ya inició sesión
            $usuariochecar = $_SESSION["UsuarioSes"];
            $passochecar = $_SESSION["PassSes"];
            $tipochecar = $_SESSION["TipoSes"];
            $mostrar = '1';
            if($tipochecar == '1') $mostrar = '2';
        }
        if($mostrar!=2){
            ?> <script> history.back(); </script> <?php
        }
    ?>

    <?php

    $resultado = mysqli_query($conexion, "SELECT * FROM Alumnos WHERE NoControl = $id");
                    while($row=mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <p>CURP: <?php echo $row["CURPAl"];?></p>
                            <p style="color: red">Tipo de sangre: <?php echo $row["TipoSangre"];?></p>
                            <p style="color: red">Alergias: <?php echo $row["Alergias"];?></p>
                            <?php
                            $fechaHoy = date("d-m-Y");
                            $nacimiento = date("d-m-Y", strtotime($row["FechaNacAl"]));
                            $anoActual = date('Y', strtotime($fechaHoy));
                            $mesActual = date('m', strtotime($fechaHoy))+1;
                            $diaActual = date('d', strtotime($fechaHoy));
                            $anoNac = date('Y', strtotime($nacimiento));
                            $mesNac = date('m', strtotime($nacimiento));
                            $diaNac = date('d', strtotime($nacimiento));
                            $edad = $anoActual - $anoNac;
                            if ($mesActual < $mesNac) {
                                $edad = $edad - 1;
                            } else if ($mesActual == $mesNac) {
                                if ($diaActual < $diaNac) {
                                    $edad = $edad - 1;
                                }
                            }
                            ?>
                            <p>Edad: <?php echo $edad ?></p>
                            <p>Nombre del tutor: <?php echo $row["NombreTut"];?> <?php echo $row["ApPaternoTut"];?> <?php echo $row["ApMaternoTut"];?></p>
                            <p>Número telefónico del tutor: <?php echo $row["NoTelefonoTut"]?></p>
                        </tr>
                        <?php } ?>
    
</body>

</html>
