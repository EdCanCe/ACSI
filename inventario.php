<?php
include("variablesglobales.php");
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>INVENTARIO</title>
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
        <h1>Inventario</h1>
        <?php
        $inv = "SELECT * from medicina;";
        $resultado = mysqli_query($conexion, $inv);
            while($row=mysqli_fetch_assoc($resultado)) { ?>
            <p>Noa: <?php echo $row['MedicinaID'] ?></p>
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["FotoMed"]).'"/>'?>
        <?php } ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>