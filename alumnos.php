<?php
include("conexion.php");
$alumnos = "SELECT * FROM alumnos";
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>HISTORIAL DE ALUMNOS</title>
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
        <table class="tabla_alumnos">
            <?php $resultado = mysqli_query($conexion, $alumnos);
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <th><?php echo $row["NoControl"];?></th>
                    <th> <?php echo $row["NombreAl"];?> <?php echo $row["ApPaternoAl"];?> <?php echo $row["ApMaternoAl"];?> </th>
                    <th><a href="alumno.php?id=<?php echo $row["NoControl"];?>">Mostrar Historial</a></th>
                </tr> <?php } ?>
        </table>
	</div>
</body>

</html>