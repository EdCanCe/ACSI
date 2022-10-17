<?php
include("variablesglobales.php");
include("conexion.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>MODIFICAR EXISTENCIAS</title>
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
        <h1>Modificación de existencias</h1>
        <?php $resultado = mysqli_query($conexion, "SELECT * FROM medicina WHERE MedicinaID = $id");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar nueva medicina?</p></center>
                <center><a class="boton_a" href="crear_medicina.php">SI</a></center>
                <?php }
            }else{ ?>
            <?php $resultado = mysqli_query($conexion, "SELECT * FROM medicina where MedicinaID = '$id'");
                    while($row=mysqli_fetch_assoc($resultado)) { ?>
                    <form action="existencias.php?id=<?php echo $id ?>" method="POST" class="registrardatos" enctype="multipart/form-data" name="formulario">
                        <label class="desaparece"></label>
                        <center><h2><?php echo $row["NombreMed"] ?></h2></center>   
                        <label class="desaparece"></label>
                        <label class="desaparece"></label>
                        <center><p>Actualmente hay <?php echo $row["CantidadMedicina"] ?></p></center>   
                        <label class="desaparece"></label>
                        <label class="lectura_label" for="">Cambio:</label>
                        <input name="Cantidad" class="lectura" type="number" required>
                        <label class="desaparece"></label>
                        
                        <input type="submit" name='submitmas' value="Añadir" class="boton_a boton_extra">
                        <label class="desaparece"></label>
                        <input type="submit" name='submitmenos' value="Sustraer" class="boton_a boton_extra">
                    </form>
        <?php } } ?>
        <?php
            if(isset($_POST['submitmas'])){
                
                $anterior = '';
                
                $resultado = mysqli_query($conexion, "SELECT * FROM medicina WHERE MedicinaID = $id");
                while($row=mysqli_fetch_assoc($resultado)){
                    $anterior = $row["CantidadMedicina"];
                }
                
                $final = $_POST['Cantidad'] + $anterior;
                
                $insertar = "UPDATE medicina SET CantidadMedicina = '$final';";
                
                $resultado = mysqli_query($conexion, $insertar);
                if($resultado) {
                    echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/medicamento.php?id=" . $id . "'</script>";
                }else{
                   echo "<script> window. location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>";
                }
                
            }
            if(isset($_POST['submitmenos'])){
                
                $anterior = '';
                
                $resultado = mysqli_query($conexion, "SELECT * FROM medicina WHERE MedicinaID = $id");
                while($row=mysqli_fetch_assoc($resultado)){
                    $anterior = $row["CantidadMedicina"];
                }
                
                $final = $anterior - $_POST['Cantidad'];
                
                $insertar = "UPDATE medicina SET CantidadMedicina = '$final';";
                
                $resultado = mysqli_query($conexion, $insertar);
                if($resultado) {
                    echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/medicamento.php?id=" . $id . "'</script>";
                }else{
                   echo "<script> window. location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>";
                }
                
            }
        ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>