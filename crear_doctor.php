<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>REGISTRAR DOCTOR</title>
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


        <?php 

            if($mostrar != 2){
                
                echo $permisoDoctor;

            }else {

        ?>


        <h1>Registro de Doctor</h1>
        <form action="insertardoctor.php" method="post" class="registrardatos">
            <label class="lectura_label" for="">Cedula Profesional:</label>
            <input name="CedulaProfesional" class="lectura" type="text" maxlength="8" minlength="8" value="<?php echo $id ?>"required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Hora de Entrada:</label>
            <input name="HoraEntrada" class="lectura" type="time" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Hora de Salida:</label>
            <input name="HoraSalida" class="lectura" type="time" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Instituto de Egreso:</label>
            <input name="Egreso" class="lectura" type="text" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Especialidad:</label>
            <input name="Especialidad" class="lectura" type="text">
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Nombre:</label>
            <input name="NombreDoc" class="lectura" type="text" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Apellido Paterno:</label>
            <input name="ApPaDoc" class="lectura" type="text" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Apellido Materno:</label>
            <input name="ApMaDoc" class="lectura" type="text">
            <label class="desaparece"></label>
            
            <label class="lectura_label" for="">Nombre de usuario:</label>
            <input name="Usuario" class="lectura" type="text" required>
            <label class="desaparece"></label>
            
            <label class="lectura_label" for="">Contraseña:</label>
            <input name="Pass" class="lectura" type="text" required>
            <label class="desaparece"></label>
            
            <center><input type="submit" value="Registrar" class="boton_a"></center>
        </form>
        <?php } ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
