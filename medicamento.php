<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>MEDICINA</title>
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


        <h1>Medicamento</h1>
        <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM Medicina WHERE MedicinaID = $id");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar nueva medicina?</p></center>
                <center><a class="boton_a" href="crear_medicina.php">SI</a></center>
                <?php }
            }else{
                while($row=mysqli_fetch_assoc($resultado)) { ?> 
                    <?php
                    if($row["FotoMed"]!=""){
                        echo'<div class="imagen_inventario" style="background-image:url(data:image/jpeg;base64,'.base64_encode($row["FotoMed"]).');"></div>';
                        }
                    ?>
                    <h2>Nombre: <?php echo $row["NombreMed"]?></h2>
                    <p>Componente(s) activo(s): <?php echo $row["ComponenteAct"]?></p>
                    <p>Gramaje(s): <?php echo $row["GramajeMed"]?></p>
                    <p>Cantidad disponible en inventario: <?php echo $row["CantidadMedicina"]?></p>
                    <div class="medicina_botones">
                        <a class="boton_a" href="existencias.php?id=<?php echo $row["MedicinaID"]?>">Modificar Existencias</a>
                        <a class="boton_a" href="modificar_medicamento.php?id=<?php echo $row["MedicinaID"]?>">Modificar Medicina</a>
                    </div>
                     <?php }
                    ?>
                    <div class="divisor"></div>
                        <center><h2>Últimas dosis administradas</h2></center><?php
                        $resultado = mysqli_query($conexion, "SELECT * FROM CantidadesMed INNER JOIN Receta ON CantidadesMed.NoConsultaFK = Receta.NoConsulta where CantidadesMed.MedicinaIDFK = $id");
                        if (mysqli_num_rows($resultado) == 0) { 
                        ?>
                            <center><p>SIN DATOS REGISTRADOS</p></center>
                        <?php
                        }else{
                            ?>
                            <table>
                                <tr>
                                    <th>Fecha</th>
                                    <th>No. Control del Alumno</th>
                                    <th></th>
                                </tr>

                            <?php
                            while($row=mysqli_fetch_assoc($resultado)) {
                                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                $fechaConsulta = date('j', strtotime($row['Fecha']))." de ".$meses[date('n', strtotime($row['Fecha']))-1]." de ".date('Y', strtotime($row['Fecha']));
                                ?>
                                    <tr>
                                        <td><center><?php echo $fechaConsulta ?></center></td>
                                        <td><center><?php echo $row["NoControlFK"];?></center></td>
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
        <?php } ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>
    
</html>
