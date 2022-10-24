<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>HISTORIAL MÉDICO</title>
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
        <h1>Historial Médico</h1>
        <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM doctor WHERE CedulaProf = '$id'");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar doctor con la misma Cedula Profesional?</p></center>
                <center><a class="boton_a" href="crear_doctor.php?id=<?php echo $id;?>">SI</a></center>
                <?php }
            }else{
                $resultado = mysqli_query($conexion, "SELECT * FROM doctor WHERE CedulaProf = '$id'");
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                        <h2>Nombre: <?php echo $row["NombreDoc"];?> <?php echo $row["ApPaternoDoc"];?> <?php echo $row["ApMaternoDoc"];?></h2> 
                        <p>Horario: <?php echo $row["HoraEntrada"];?>-<?php echo $row["HoraSalida"];?></p>
                        <p>Cedula Profesional: <?php echo $row["CedulaProf"];?></p>
                        <p>Instituto de Egreso: <?php echo $row["InstitutoEgreso"];?></p>
                        <p>Especialidad: <?php echo $row["Especialidad"];?></p>
                <?php }
            } ?>
	</div>

    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>
</html>
