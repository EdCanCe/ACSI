<?php
include("conexion.php");
include("variablesglobales.php");
$alumnos = "SELECT * FROM alumnos";
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>HISTORIAL MÉDICO</title>
	<meta charset="utf-8">
	<meta name="author" content="Jorge Arturo Salgado Ceja, José Roberto García Correa, Edmundo Canedo Cervantes">
	<meta name="description" content="Sistema para la gestión de enfermería, teniendo elaboración de recetas, vista de historial médico e inventario de medicinas">
	<meta name="keywords" content="enfermería, hora, js, html5, css">
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
	<link rel="icon" href="imgs/icon.png">
	<script src="script.js"></script>
</head>

<body>

	<?php //ESTE HACE EL MENÚ DESPLEGABLE
        echo $header;
    ?>
    
	<div class="cuerpo">
        <h1>Historial Médico</h1>
        <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM alumnos WHERE NoControl = $id");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar alumno con el mismo No.Control?</p></center>
                <center><a class="boton_a" href="crear_alumno.php?id=<?php echo $id;?>">SI</a></center>
                <?php }
            }else{
                $resultado = mysqli_query($conexion, "SELECT * FROM alumnos WHERE NoControl = $id");
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <h2>Nombre: <?php echo $row["NombreAl"];?> <?php echo $row["ApPaternoAl"];?> <?php echo $row["ApMaternoAl"];?></h2> 
                    <p>No. Control: <?php echo $row["NoControl"];?></p>
                    <p>CURP: <?php echo $row["CURPAl"];?></p>
                    <p>Tipo de sangre: <?php echo $row["TipoSangre"];?></p>
                    <p>Alergias: <?php echo $row["Alergias"];?></p>
                    <?php
                    $fechaHoy = date("d-m-Y");
                    $nacimiento = date("d-m-Y", strtotime($row["FechaNacAl"]));
                    ?>
                    <p>Fecha de Nacimiento: <?php echo $nacimiento ?></p>
                    <p>Dia de hoy: <?php echo $fechaHoy ?></p>
                    <p>Nombre del tutor: <?php echo $row["NombreTut"];?> <?php echo $row["ApPaternoTut"];?> <?php echo $row["ApMaternoTut"];?></p>
                    <p>Número telefónico del tutor: <?php echo $row["NoTelefonoTut"]?></p>
                </tr> <?php }
            }  
        ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>