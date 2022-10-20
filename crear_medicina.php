<?php
include("variablesglobales.php");
session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>REGISTRAR MEDICINA</title>
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
        <h1>Registro de Medicina</h1>
        <form action="crear_medicina.php" method="POST" class="registrardatos" enctype="multipart/form-data" name="formulario">
            <label class="lectura_label" for="">Nombre:</label>
            <input name="nombre" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Componentes activos:</label>
            <input name="componentes" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Gramaje de los componentes activos:</label>
            <input name="gramaje" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label linea_4" for="">Foto:</label>
            <input name="foto" class="lectura_archivo " type="file">
            <label class="desaparece"></label>
            <center><input type="submit" name='submit' value="Registrar" class="boton_a"></center>
        </form>
        <?php
            if(isset($_POST['submit'])){
                
                $nombre = $_POST['nombre'];
                $componente = $_POST['componentes'];
                $gramaje = $_POST['gramaje'];
                
                $negado = "SELECT NombreMed FROM medicina where NombreMed = '$nombre';";
                $querynegado = mysqli_query($conexion, $negado);
                if (mysqli_num_rows($querynegado) == 0){
                    if ($_FILES["foto"]["name"] == ""){
                        $insertar = "INSERT INTO medicina(NombreMed, ComponenteAct, GramajeMed) VALUES ('$nombre', '$componente', '$gramaje');";
                    }else{
                        $nombreImagen = $_FILES["foto"]["name"];
                        $datosImagen = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
                        $tipoImagen = $_FILES["foto"]["type"];
                        if(substr($tipoImagen, 0, 5) == 'image'){
                        }else{
                            echo "<script> window. location='/ACSI/registro_denegado.php?id=Archivo de imagen inválido'</script>";
                        }
                        $insertar = "INSERT INTO medicina(NombreMed, ComponenteAct, GramajeMed, FotoMed) VALUES ('$nombre', '$componente', '$gramaje', '$datosImagen');";
                    }
                    mysqli_query($conexion, "SET GLOBAL max_allowed_packet=1073741824");
                    $resultado = mysqli_query($conexion, $insertar);
                    
                    #Conseguir el id de la ultima medicina
                    $idMedicina = '';
                    $resultadoaux = mysqli_query($conexion, "SELECT MedicinaID FROM medicina where NombreMed = '$nombre';");
                    while($row=mysqli_fetch_assoc($resultadoaux)){
                        $idMedicina = $row["MedicinaID"];
                    }
                    #Conseguir el id de la ultima medicina
                    
                    if($resultado) {
                        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/medicamento.php?id=" . $idMedicina . "'</script>";
                    }else{
                       echo "<script> window. location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>";
                }
                }else{
                    echo "<script> window. location='/ACSI/registro_denegado.php?id=No se puede registrar nuevamente una medicina que ya existe'</script>";
                }
                
                
            }
        ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
