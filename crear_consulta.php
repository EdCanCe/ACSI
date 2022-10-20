<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>NUEVA CONSULTA</title>
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
        <h1>Nueva consulta</h1>
        <form action="insertarconsulta.php" method="post" class="registrardatos">
            <label class="lectura_label" for="">No. Control</label>
            <select name="NoControlFK" class="lectura" required>
                <option value="" selected disabled>--</option>
                <?php 
                $resultado = mysqli_query($conexion, "SELECT NoControl, NombreAl FROM alumnos");
                while($row=mysqli_fetch_assoc($resultado)) {
                    ?>
                    <option value="<?php echo $row["NoControl"] ?>"><?php echo $row["NoControl"] ?> - <?php echo $row["NombreAl"] ?></option>
                    <?php }
                ?>
            </select>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Temperatura Actual</label>
            <input name="Temperatura" class="lectura" type="number" min="25" placeholder="En grados celsius" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Peso Actual</label>
            <input name="Peso" class="lectura" type="number" min="25" placeholder="En kilogramos" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Padecimientos</label>
            <input name="Padecimientos" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Medicamento administrado</label>
            <select name="MedicinaFK" class="lectura">
                <option value="" selected disabled>--</option>
                <?php 
                $resultado = mysqli_query($conexion, "SELECT NombreMed FROM medicina");
                while($row=mysqli_fetch_assoc($resultado)) {
                    ?>
                    <option value="<?php echo $row["NombreMed"] ?>"><?php echo $row["NombreMed"] ?></option>
                    <?php }
                ?>
            </select>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Cantidad administrada</label>
            <input name="Cantidad" class="lectura" type="number">
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Tratamiento</label>
            <input name="Tratamiento" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <center><input type="submit" value="Registrar" class="boton_a"></center>
        </form>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
