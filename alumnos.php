<?php
include("conexion.php");
include("variablesglobales.php");
$alumnos = "SELECT * FROM alumnos where NoControl like '%%'";
$id = '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>HISTORIAL DE ALUMNOS</title>
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
        <h1>Historiales de Alumnos</h1>
        <input type="text" class="buscador_principal" id="buscador_alumnos" onkeyup="buscar_alumnos()" placeholder="Número de Control del Alumno">
        <center><a class="boton_a" href="crear_alumno.php?id=<?php echo $id;?>">REGISTRAR NUEVO ALUMNO</a></center>
        <table class="tabla_alumnos" id="tabla_alumnado">
            <tr>
                <th>No Control</th>
                <th>Nombre</th>
                <th></th>
            </tr>
            <?php $resultado = mysqli_query($conexion, $alumnos);
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $row["NoControl"];?></td>
                    <td> <?php echo $row["NombreAl"];?> <?php echo $row["ApPaternoAl"];?> <?php echo $row["ApMaternoAl"];?> </td>
                    <td><a href="alumno.php?id=<?php echo $row["NoControl"];?>">Mostrar Historial</a></td>
                </tr> <?php } ?>
        </table>
	</div>
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
</body>
<script>
    function buscar_alumnos(){
        var control = document.getElementById('buscador_alumnos').value;
        
    }
</script>
</html>