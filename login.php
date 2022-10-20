<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>REGISTRARSE</title>
	<meta charset="utf-8">
	<meta name="author" content="Jorge Arturo Salgado Ceja, José Roberto García Correa, Edmundo Canedo Cervantes">
	<meta name="description" content="Sistema para la gestión de enfermería, teniendo elaboración de recetas, vista de historial médico e inventario de medicinas">
	<meta name="keywords" content="enfermería, hora, js, html5, css">
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
	<link rel="icon" href="imgs/icon.png">
	<script src="script.js"></script>
</head>

<body>

    <?php //ESTE HACE EL FOOTER
        echo $header;
    ?>

	<div class="cuerpo">
    <h1>Sistema de Login</h1>
    <form action="validar.php" method="post" class="registrardatos">
    <label class="lectura_label" for="">Usuario:</label>
    <input type="text" placeholder="Ingrese su usuario" name="usuario" class="lectura" required>
    <label class="desaparece"></label>
    <label class="lectura_label" for="">Contraseña:</label>
    <input type="password" placeholder="Ingrese su contraseña" name="pass" class="lectura" required>
    <label class="desaparece"></label>
    <center><input type="submit" value="ingresar" class="boton_a"></center>

    </form>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
