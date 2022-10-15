<?php
include("conexion.php");
include("variablesglobales.php");
$alumnos = "SELECT * FROM alumnos";
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>INICIO</title>
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
        <center><img src="imgs/icon.png" class="imagen_logo"></center>
		<h1 class="ACSI_principal">ACSI</h1>
		<div class="index_direccion">
			<img src="">
			<p>Domicilio:<br><br>Av Francisco I. Madero Ote 4923, Cd Industrial, 58200 Morelia, Mich. Junto al salón 11
				en el edificio E
			</p>
		</div>
		<div class="index_doctor">
			<p id="Doc">Leticia Cisneros Lemus</p>
			<p>7 AM - 2 PM</p>
		</div>

		<div class="index_doctor">
			<p id="Doc2">Fabiola Saavedra Talavera</p>
			<p>1 PM - 8 PM</p>
		</div>

		<div class="index_descripcion">
			<p>Administracion de Centros de Salud Institucionales "ACSI", fue creado con la intencion de mejorar
				el manejo de informacion de una enfermeria escolar, con el uso y manjo de diversas herramientas web
				y el manejo de bases de datos. Mejorando asi aspectos como: el uso de inverntarios, implementando
				historiales
				personales a los alumnos.</p>
		</div>

	</div>
        
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>

<!--
 id="container"
box-text 
-->