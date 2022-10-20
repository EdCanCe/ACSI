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
            $resultado = mysqli_query($conexion, "SELECT * FROM alumnos WHERE NoControl = $id");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar alumno con el mismo No.Control?</p></center>
                <center><a class="boton_a" href="crear_alumno.php?id=<?php echo $id;?>">SI</a></center>
                <?php }
            }else{
                $resultado = mysqli_query($conexion, "SELECT * FROM alumnos WHERE NoControl = $id");
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <h2>Nombre: <?php echo $row["NombreAl"];?> <?php echo $row["ApPaternoAl"];?> <?php echo $row["ApMaternoAl"];?></h2> 
                        <p>No. Control: <?php echo $row["NoControl"];?></p>
                        <p>CURP: <?php echo $row["CURPAl"];?></p>
                        <p>Tipo de sangre: <?php echo $row["TipoSangre"];?></p>
                        <p>Alergias: <?php echo $row["Alergias"];?></p>
                        <?php
                        $fechaHoy = date("d-m-Y");
                        $nacimiento = date("d-m-Y", strtotime($row["FechaNacAl"]));
                        $anoActual = date('Y', strtotime($fechaHoy));
                        $mesActual = date('m', strtotime($fechaHoy))+1;
                        $diaActual = date('d', strtotime($fechaHoy));
                        $anoNac = date('Y', strtotime($nacimiento));
                        $mesNac = date('m', strtotime($nacimiento));
                        $diaNac = date('d', strtotime($nacimiento));
                        $edad = $anoActual - $anoNac;
                        if ($mesActual < $mesNac) {
                            $edad = $edad - 1;
                        } else if ($mesActual == $mesNac) {
                            if ($diaActual < $diaNac) {
                                $edad = $edad - 1;
                            }
                        }
                        ?>
                        <p>Edad: <?php echo $edad ?></p>
                        <p>Nombre del tutor: <?php echo $row["NombreTut"];?> <?php echo $row["ApPaternoTut"];?> <?php echo $row["ApMaternoTut"];?></p>
                        <p>Número telefónico del tutor: <?php echo $row["NoTelefonoTut"]?></p>
                    </tr>
                    <center><a class="boton_a" href="modificar_alumno.php?id=<?php echo $row["NoControl"];?>">Modificar datos</a></center>
                    <div class="divisor"></div>
                    <center><h2>Consultas Médicas</h2></center><?php }
                $resultado = mysqli_query($conexion, "SELECT * FROM receta WHERE NoControlFK = $id");
                if (mysqli_num_rows($resultado) == 0) { 
                    ?>
                    <center><p>SIN DATOS REGISTRADOS</p></center>
                    <?php
                }else{
                    ?>
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
                                <td><a href="consulta_medica.php?id=<?php echo $row["NoConsulta"];?>">Mostrar Consulta Médica</a></td>
                            </tr>
                        <?php
                    }
                    ?>
                        </table>
                    <?php
                }  
                      
            }  
        ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>
    
</html>
