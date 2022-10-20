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
        echo $header;
    ?>
    
        
	<div class="cuerpo">
        <center><img src="imgs/icon.png" class="imagen_logo"></center>
		<h1 class="ACSI_principal">ACSI</h1>
		<div class="index_direccion">
			<img src="">
			<p>Domicilio:<br><br>Av Francisco I. Madero Ote 4923, Cd Industrial, 58200 Morelia, Mich. Junto al salón 11
				en el edificio E
			</p>
		</div>
        
        <div class="index_descripcion">
			<p>Administracion de Centros de Salud Institucionales "ACSI", fue creado con la intencion de mejorar
				el manejo de informacion de una enfermeria escolar, con el uso y manjo de diversas herramientas web
				y el manejo de bases de datos. Mejorando asi aspectos como: el uso de inventarios, implementación de historiales personales a los , etc.</p>
		</div>
        
        <div class="divisor"></div>
        <center><h2>Doctores disponibles actualmente</h2></center>
            <?php	
                date_default_timezone_set('America/Mexico_City');
                $horaActual = date('G:i:s');
                $resultado = mysqli_query($conexion, "SELECT * from doctor where (HoraSalida > '$horaActual' and horaEntrada < '$horaActual')");
            
                if (mysqli_num_rows($resultado) == 0){
                    ?>
                    <center><p>No hay doctores disponibles/trabajando actualmente</p></center>
                    <?php
                } else{
                    ?> <table id="tabla_tr">
                            <tr>
                                <th>Horario</th>
                                <th>Cedula Prof.</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr> <?php
                            while($row=mysqli_fetch_assoc($resultado)) {
                                $entrada = date('h:i a', strtotime($row["HoraEntrada"]));
                                $salida = date('h:i a', strtotime($row["HoraSalida"]));
                            ?>
                            <tr>
                                <td><center><?php echo $entrada ;?> - <?php echo $salida;?></center></td>
                                <td><center><?php echo $row["CedulaProf"];?></center></td>
                                <td><center><?php echo $row["NombreDoc"];?> <?php echo $row["ApPaternoDoc"];?> <?php echo $row["ApMaternoDoc"];?> </center></td>
                                <td><center><a href="doctor.php?id=<?php echo $row["CedulaProf"];?>">Mostrar datos</a></center></td>
                        </tr> </table><?php } }?>

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
