<?php
include("conexion.php");
include("variablesglobales.php");
$alumnos = "SELECT * FROM alumnos";
$id = $_GET["id"];
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
		<h1>Registro aceptado</h1>
        <center><p>Se registró lo pedido</p><br></center>
        <center><a class="boton_a" href="<?php echo     $id ?>">CONTINUAR</a></center>
        <br>
        <center><img src="imgs/registro_aceptado.png" class="imagen_logo"></center>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>