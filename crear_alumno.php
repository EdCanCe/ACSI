<?php
include("conexion.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>CREAR ALUMNO</title>
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
        <h1>Creación de Alumno</h1>
        <form action="insertaralumno.php" method="post" class="registrardatos">
            <label class="lectura" for="">Nombre:</label>
            <input name="nombre" class="lectura" type="text">
            <label class="lectura" for="">Apellido Paterno:</label>
            <input name="appaterno" class="lectura" type="text">
            <label class="lectura" for="">Apellido Materno:</label>
            <input name="apmaterno" class="lectura" type="text">
            <label class="lectura" for="">No. Control:</label>
            <input name="nocontrol" class="lectura" type="number">
            <label class="lectura" for="">CURP:</label>
            <input name="curp" class="lectura" type="text">
            <label class="lectura" for="">Tipo de sangre:</label>
            <input name="sangre" class="lectura" type="text">
            <label class="lectura" for="">Alergias:</label>
            <input name="alergias" class="lectura" type="text">
            <label class="lectura" for="">Nombre del tutor:</label>
            <input name="nombretut" class="lectura" type="text">
            <label class="lectura" for="">Ap. Paterno del tutor:</label>
            <input name="appaternotut" class="lectura" type="text">
            <label class="lectura" for="">Ap. Materno del tutor:</label>
            <input name="apmaternotut" class="lectura" type="text">
            <label class="lectura" for="">No. Teléfono del tutor:</label>
            <input name="notel" class="lectura" type="number">
            <label class="lectura" for="">Fecha de Nacimiento</label>
            <input name="nacimiento" class="lectura" type="date">
            <input type="submit" value="Registrar">
        </form>
	</div>
</body>

</html>