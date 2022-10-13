<?php
include("conexion.php");
$id = $_GET["id"];
$alumnos = "SELECT * FROM alumnos WHERE NoControl = '$id'";
$receta = "SELECT * FROM receta WHERE NoControlFK = '$id'";
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

	<div class="dropdown">
		<button id="abrir-menu">☰</button>
		<div class="dropdown-content">
			<a href="index.php">Inicio</a>
			<a href="inventario.php">Inventario</a>
			<a href="consulta-inicio.php">Añadir Consulta</a>
            <a href="consultas.php">Historial de Consultas</a>
			<a href="alumnos.php">Historiales de Alumnos</a>
			<a><input type="text" class="In-control" placeholder="Buscar Alumno por No.Control"></a>
		</div>
	</div>
    
	<div class="cuerpo">
        <h1>Historial Médico</h1>
        <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM alumnos WHERE NoControl = '$id'");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Crear alumno con el mismo No.Control?</p></center>
                <center><a class="boton_a" href="crear_alumno.php?id=<?php echo $id;?>">SI</a></center>
                <?php }
            }else{ 
               $resultado = mysqli_query($conexion, $alumnos);
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <h2>Nombre: <?php echo $row["NombreAl"];?> <?php echo $row["ApPaternoAl"];?> <?php echo $row["ApMaternoAl"];?></h2> 
                    <p>No. Control: <?php echo $row["NoControl"];?></p>
                    <p>CURP: <?php echo $row["CURPAl"];?></p>
                    <p>Tipo de sangre: <?php echo $row["TipoSangre"];?></p>
                    <p>Alergias: <?php echo $row["Alergias"];?></p>
                </tr> <?php }
            }  
        ?>
	</div>
</body>

</html>