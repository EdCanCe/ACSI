<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>DOCTOR</title>
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

        <h1>Doctor</h1>
        <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM Doctor WHERE CedulaProf = '$id'");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar doctor con la misma Cedula Profesional?</p></center>
                <center><a class="boton_a" href="crear_doctor.php?id=<?php echo $id;?>">SI</a></center>
                <?php }
            }else{
                $resultado = mysqli_query($conexion, "SELECT * FROM Doctor WHERE CedulaProf = '$id'");
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                        <h2>Nombre: <?php echo $row["NombreDoc"];?> <?php echo $row["ApPaternoDoc"];?> <?php echo $row["ApMaternoDoc"];?></h2> 
                        <p>Horario: <?php echo $row["HoraEntrada"];?>-<?php echo $row["HoraSalida"];?></p>
                        <p>Cedula Profesional: <?php echo $row["CedulaProf"];?></p>
                        <p>Instituto de Egreso: <?php echo $row["InstitutoEgreso"];?></p>
                        <p>Especialidad: <?php echo $row["Especialidad"];?></p>
                        <?php 
                            if($mostrar == 2){
                                ?> 
                                    <div class="divisor"></div>
                                    <h2><center>ÚLTIMAS CONSULTAS</center></h2>
                                <?php

                                    $resultado = mysqli_query($conexion, "SELECT * FROM Receta WHERE CedulaProfFK = '$id' order by Fecha DESC");
                                    if (mysqli_num_rows($resultado) == 0) { 
                                        ?>
                                        <center><p>NO HA TENIDO CITAS</p></center>
                                        <?php
                                    }else{
                                        $fechaHoy = date("y-m-d");
                                        $fechaAntigua = date('y-m-d', strtotime('-32 days'));
                                        $resultado2 = mysqli_query($conexion, "select count(*) as Cantidad, DATE_FORMAT(Fecha,'%y-%m-%d') as FechaS FROM Receta where Fecha >= '$fechaAntigua' and '$fechaHoy' >= Fecha and CedulaProfFK = '$id'GROUP BY DATE_FORMAT(Fecha,'%y-%m-%d')");
                                        ?>
                                        
                                        <center><h4>Ha tenido: <?php echo mysqli_num_rows($resultado2) ?> citas este mes</h4></center>
                                        <table>
                                            <tr>
                                                <th>Fecha</th>
                                                <th></th>
                                            </tr>
                                            
                                        <?php
                                        while($row=mysqli_fetch_assoc($resultado)) {
                                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                            $fechaConsulta = date('j', strtotime($row['Fecha']))." de ".$meses[date('n', strtotime($row['Fecha']))-1]." de ".date('Y', strtotime($row['Fecha']));
                                            ?>
                                                <tr>
                                                    <td><center><?php echo $fechaConsulta ?></center></td>
                                                    <td><a href="consulta.php?id=<?php echo $row["NoConsulta"];?>">Mostrar Consulta Médica</a></td>
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                            </table>
                                        <?php
                                    } 

                            }
                        ?>
                <?php }
 

            } ?>
	</div>

    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>
</html>
