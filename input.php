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

	<div class="cuerpo">
        <h1>Registro</h1>
        <form action="registro.php" method="post" class="registrardatos">

            <label class="lectura_label" for="">Correo:</label>
            <input name="email" class="lectura" type="email" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Usuario:</label>
            <input name="username" class="lectura" type="text" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Contraseña:</label>
            <input name="password" class="lectura" type="password" required>
            <label class="desaparece"></label>
            
            <center><input type="submit" value="Registrar" class="boton_a"></center>
        </form>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
