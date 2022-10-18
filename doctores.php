<?php
include("conexion.php");
include("variablesglobales.php");
$doctores = "SELECT * FROM doctor where CedulaProf like '%%'";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

	<?php //ESTE HACE EL MENÚ DESPLEGABLE
        echo $header;
    ?>

	<div class="cuerpo">
        <h1>Doctores</h1>
        <input type="text" class="buscador_principal" id="buscador_tr" placeholder="Cédula profesional del doctor" onkeyup="buscar($('#buscador_tr').val());">
        <center><a class="boton_a bordes" href="crear_doctor.php?id=<?php echo $id;?>">REGISTRAR NUEVO DOCTOR</a></center>
        <table id="tabla_tr">
            <tr>
                <th>Cedula Prof.</th>
                <th>Nombre</th>
                <th></th>
            </tr>
            <?php $resultado = mysqli_query($conexion, $doctores);
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><center><?php echo $row["CedulaProf"];?></center></td>
                    <td><center><?php echo $row["NombreDoc"];?> <?php echo $row["ApPaternoDoc"];?> <?php echo $row["ApMaternoDoc"];?></center></td>
                    <td><center><a href="doctor.php?id=<?php echo $row["CedulaProf"];?>">Mostrar datos</a></center></td>
                </tr> <?php } ?>
        </table>
	</div>
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
</body>
<script type="text/javascript">
    function buscar(entrada){
        var datos = {"entrada":entrada};
        $.ajax({
            data:datos,
            type: 'POST',
            url:'buscador_doctor.php',
            success: function(data){
                document.getElementById('tabla_tr').innerHTML = data;
            }
        });
    }
</script>
</html>
