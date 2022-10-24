<?php
include("variablesglobales.php");
session_start();
include("conexion.php");
$id = $_GET["id"];
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
        <h1>Registro de Medicina</h1>
        <?php $resultado = mysqli_query($conexion, "SELECT * FROM Medicina WHERE MedicinaID = $id");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar nueva medicina?</p></center>
                <center><a class="boton_a" href="crear_medicina.php">SI</a></center>
                <?php }
            }else{ ?>
        <form action="modificar_medicamento.php?id=<?php echo $id ?>" method="POST" class="registrardatos" enctype="multipart/form-data" name="formulario">
            <?php $resultado = mysqli_query($conexion, "SELECT * FROM Medicina where MedicinaID = '$id'");
                    while($row=mysqli_fetch_assoc($resultado)) { ?>
                    <label class="lectura_label" for="">Nombre:</label>
                    <input name="nombre" class="lectura" type="text" value="<?php echo $row["NombreMed"] ?>" required>
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Componentes activos:</label>
                    <input name="componentes" class="lectura" type="text" value="<?php echo $row["ComponenteAct"] ?>" required>
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Gramaje de los componentes activos:</label>
                    <input name="gramaje" class="lectura" type="text" value="<?php echo $row["GramajeMed"] ?>" required>
                    <label class="desaparece"></label>
                    <label class="lectura_label linea_4" for="">Foto:</label>
                    <input name="foto" class="lectura_archivo " type="file" value="imgs/icon.png">
                    <label class="desaparece"></label>
                    <center><input type="submit" name='submit' value="Registrar" class="boton_a"></center>
                </form>
        <?php } } ?>
        <?php
            if(isset($_POST['submit'])){
                
                $nombre = $_POST['nombre'];
                $componente = $_POST['componentes'];
                $gramaje = $_POST['gramaje'];
                
                $negado = "SELECT * FROM Medicina where MedicinaID = '$id'";
                $querynegado = mysqli_query($conexion, $negado);
                if (mysqli_num_rows($querynegado) != 0){
                    if ($_FILES["foto"]["name"] == ""){
                        $insertar = "UPDATE Medicina SET NombreMed = '$nombre', ComponenteAct = '$componente', GramajeMed = '$gramaje' where MedicinaID = '$id'";
                    }else{
                        $nombreImagen = $_FILES["foto"]["name"];
                        $datosImagen = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
                        $tipoImagen = $_FILES["foto"]["type"];
                        if(substr($tipoImagen, 0, 5) == 'image'){
                        }else{
                            echo "<script> window. location='/ACSI/registro_denegado.php?id=Archivo de imagen inválido'</script>";
                        }
                        $insertar = "UPDATE medicina SET NombreMed = '$nombre', ComponenteAct = '$componente', GramajeMed = '$gramaje', FotoMed = '$datosImagen' where MedicinaID = '$id'";       }
                    mysqli_query($conexion, "SET GLOBAL max_allowed_packet=1073741824");
                    $resultado = mysqli_query($conexion, $insertar);
                    
                    if($resultado) {    
                        echo "<script> window. location='/ACSI/registro_aceptado.php?id=/ACSI/medicamento.php?id=" . $id . "'</script>";
                    }else{
                       echo "<script> window. location='/ACSI/registro_denegado.php?id=Hubo un error no identificado en el registro</script>";
                }
                }else{
                    echo "<script> window. location='/ACSI/registro_denegado.php?id=No se puede modificar un medicamento que no existe'</script>";
                }
                
                
            }
        ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
