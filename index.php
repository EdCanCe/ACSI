<?php
include("conexion.php");
session_start();
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
        $mostrar = '0';
        if(isset($_SESSION["UsuarioSes"])){ //checa si ya inició sesión
            $usuariochecar = $_SESSION["UsuarioSes"];
            $passochecar = $_SESSION["PassSes"];
            $tipochecar = $_SESSION["TipoSes"];
            $mostrar = '1';
            if($tipochecar == '1') $mostrar = '2';
        }
        if($mostrar == 0){
            echo $headersin;
        }
        else if($mostrar == 1){
            echo $headeralm;
        }else if($mostrar == 2){
            echo $headerdoc;
        }
    ?>
    
        
	<div class="cuerpo">
        <div class="auxliarindex">
            <a href="login.php" class="boton_a">Iniciar sesión</a>
            <a href="crear_cuenta.php" class="boton_a">Crear Cuenta</a>
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
