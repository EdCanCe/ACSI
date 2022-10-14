<?php
include("conexion.php");
include("variablesglobales.php");
$alumnos = "SELECT * FROM alumnos";
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
        echo $header;
    ?>
    
	<div class="cuerpo">
        <h1>Creación de Alumno</h1>
        <form action="insertaralumno.php" method="post" class="registrardatos">
            <label class="lectura" for="">Nombre:</label>
            <input name="nombre" class="lectura" type="text" required>
            <label class="lectura" for="">Apellido Paterno:</label>
            <input name="appaterno" class="lectura" type="text" required>
            <label class="lectura" for="">Apellido Materno:</label>
            <input name="apmaterno" class="lectura" type="text">
            <label class="lectura" for="">No. Control:</label>
            <input name="nocontrol" class="lectura" type="number" value="<?php echo $id;?>" required>
            <label class="lectura" for="">CURP:</label>
            <input name="curp" class="lectura" type="text" required >
            <label class="lectura" for="">Tipo de sangre:</label>
            <select name="sangre" class="lectura">
                <option value="--">--</option>
                <option value="0-">0-</option>
                <option value="0+">0+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select>   
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
            <input name="nacimiento" class="lectura" type="date" required>
            <input type="submit" value="Registrar">
        </form>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>