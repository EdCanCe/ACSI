<?php
include("conexion.php");
include("variablesglobales.php");
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
		<h1>Registro fallido</h1>
        <center><p><?php echo $id ?></p><br></center>
        <center><a class="boton_a" onclick="regresar()">VOLVER</a></center>
        <br>
        <center><img src="imgs/registro_fallido.png" class="imagen_logo"></center>
	</div>
    <script>
        function regresar(){
            history.back();
        }
    </script>
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>