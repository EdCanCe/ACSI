<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$alumnos = "SELECT * FROM Alumnos";
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>REGISTRAR ALUMNO</title>
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


        <h1>Registro de Alumno</h1>
        <form action="insertaralumno.php" method="post" class="registrardatos">
            <label class="lectura_label" for="">Nombre:</label>
            <input name="nombre" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Apellido Paterno:</label>
            <input name="appaterno" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Apellido Materno:</label>
            <input name="apmaterno" class="lectura" type="text">
            <label class="desaparece"></label>
            <label class="lectura_label" for="">No. Control:</label>
            <input name="nocontrol" class="lectura" type="number" max="99999999999999" min="0" value="<?php echo $id;?>" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">CURP:</label>
            <input name="curp" class="lectura" type="text" required >
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Alergias:</label>
            <input name="alergias" class="lectura" type="text">
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Nombre del tutor:</label>
            <input name="nombretut" class="lectura" type="text">
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Ap. Paterno del tutor:</label>
            <input name="appaternotut" class="lectura" type="text">
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Ap. Materno del tutor:</label>
            <input name="apmaternotut" class="lectura" type="text">
            <label class="desaparece"></label>
            <label class="lectura_label" for="">No. Teléfono del tutor:</label>
            <input name="notel" class="lectura" type="number">
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Fecha de Nacimiento</label>
            <input name="nacimiento" class="lectura" type="date" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Tipo de sangre:</label>
            <select name="sangre" class="lectura">
                <option value="--">--</option>
                <option value="O-">O-</option>
                <option value="O+">O+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select>
            <label></label>
            <center><input type="submit" value="Registrar" class="boton_a"></center>
        </form>
        <?php } ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
