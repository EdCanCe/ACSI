<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>CONSULTA MÉDICA</title>
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
        <h1>Consulta Médica</h1>
        <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM Receta WHERE NoConsulta = $id");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTA CONSULTA NO EXISTE</h2></center>
                <?php }
            }else{
                while($row=mysqli_fetch_assoc($resultado)) { ?>
        
                    <h2>Doctor: <?php 
                        
                            $aux = $row['CedulaProfFK'];
                            $salida = "";
                            $resultado2 = mysqli_query($conexion, "SELECT * FROM Doctor WHERE CedulaProf = '$aux'");
                            while($row2=mysqli_fetch_assoc($resultado2)) {
                                $salida = $row2["NombreDoc"]." ".$row2["ApPaternoDoc"]." ".$row2["ApMaternoDoc"]."<a href='doctor.php?id=".$row2["CedulaProf"]."' class='boton_a'>Ver</a>";
                            }
                            
                            echo $salida;                                    
                    
                        ?></h2>
        
                    <h2>Paciente: <?php 
                        
                            $aux = $row['NoControlFK'];
                            $salida = "";
                            $resultado2 = mysqli_query($conexion, "SELECT * FROM Alumnos WHERE NoControl = '$aux'");
                            while($row2=mysqli_fetch_assoc($resultado2)) {
                                $salida = $row2["NombreAl"]." ".$row2["ApPaternoAl"]." ".$row2["ApMaternoAl"]."<a href='alumno.php?id=".$row2["NoControl"]."' class='boton_a'>Ver</a>";;
                            }
                            
                            echo $salida;                                    
                    
                        ?></h2>
        
                    <p>Peso: <?php echo $row["PesoPaciente"] ?>kg</p>
                    <p>Altura: <?php echo $row["Altura"] ?>mts</p>
                    <p>Temperatura: <?php echo $row["Altura"] ?>°C</p>
                    <br>
        
                    <h3>Padecimientos:</h3>
                    <p><?php echo $row["Padecimientos"] ?></p>
                    <br>
        
                    <h3>Diagnóstico:</h3>
                    <p><?php echo $row["Diagnostico"] ?></p>
                    <br>
        
                    <h3>Tratamiento:</h3>
                    <p><?php echo $row["Dosis"] ?></p>
                    <br>
        
                    <center><a class="boton_a" href="PDFReceta.php?id=<?php echo $row["NoConsulta"] ?>">Ver Receta</a></center>
        
                    <div class="divisor"></div>
                    <h2><center>Medicamentos Administrados</center></h2>
        
                <?php }
                $resultado = mysqli_query($conexion, "SELECT * FROM CantidadesMed WHERE NoConsultaFK = '$id'");
                if (mysqli_num_rows($resultado) == 0) { 
                    ?>
                    <center><p>NO SE LE ADMINISTRÓ NINGUNO</p></center>
                    <?php
                }else{
                    ?>
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                        </tr>
                        
                    <?php
                    while($row=mysqli_fetch_assoc($resultado)) {
                        ?>
                            <tr>
                                <td><center><?php 
                                
                                $aux = $row['NoConsultaFK'];
                                $aux2 = $row['MedicinaIDFK'];
                                $salida = "";
                                $resultado2 = mysqli_query($conexion, "SELECT * FROM Medicina WHERE MedicinaID = '$aux2'");
                                while($row2=mysqli_fetch_assoc($resultado2)) {
                                    $salida = $row2["NombreMed"];
                                }

                                echo $salida;   
                                    
                                ?></center></td>

                                <td><center><?php echo $row["Cantidad"] ?></center></td>

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
