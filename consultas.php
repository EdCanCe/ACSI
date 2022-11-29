<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$id = '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>CONSULTAS MÉDICAS</title>
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


        <h1>Últimas consultas</h1>
        <center><a class="boton_a bordes" href="crear_consulta.php">NUEVA CONSULTA</a></center>
        <table id="tabla_tr">
            <tr>
                <th>Fecha</th>
                <th></th>
            </tr>
            <?php $resultado = mysqli_query($conexion, "SELECT * FROM Receta order by Fecha DESC");
                while($row=mysqli_fetch_assoc($resultado)) { 
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $fechaConsulta = date('j', strtotime($row['Fecha']))." de ".$meses[date('n', strtotime($row['Fecha']))-1]." de ".date('Y', strtotime($row['Fecha']));
                ?>
                <tr>
                    <td><center><?php echo $fechaConsulta;?></center></td>
                    <td><center><a href="consulta.php?id=<?php echo $row["NoConsulta"];?>">Mostrar Consulta</a></center></td>
                </tr> <?php } ?>
        </table>
        <?php } ?>
	</div>
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
</html>
