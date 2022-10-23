<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$id = $_GET["id"];
$alumnos = "SELECT * FROM alumnos where NoControl = $id";
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>MODIFICAR ALUMNO</title>
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
        <h1>Modificación de Alumno</h1>
        <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM Alumnos WHERE NoControl = $id");
            if (mysqli_num_rows($resultado) == 0) { 
                { ?>
                <center><h2>ESTÁ VACÍO</h2></center>
                <center><p>¿Registrar alumno con el mismo No.Control?</p></center>
                <center><a class="boton_a" href="crear_alumno.php?id=<?php echo $id;?>">SI</a></center>
                <?php }
            }else{ ?>
            <form action="insertarmodalumno.php?id=<?php echo $id ?>" method="post" class="registrardatos">
                <?php $resultado = mysqli_query($conexion, $alumnos);
                    while($row=mysqli_fetch_assoc($resultado)) {
                    $tipos = array("--", "O-", "O+","A-", "A+", "B-", "B+", "AB-", "AB+");
                    $opciones = "";
                    foreach($tipos as $tipo){
                        $opciones.="<option value='".$tipo."'";
                        if($tipo == $row['TipoSangre']){
                            $opciones.=" selected";
                        }
                        $opciones.=">".$tipo."</option>";
                    }
                    ?>
                    <label class="lectura_label" for="">Nombre:</label>
                    <input name="nombre" class="lectura" type="text" value="<?php echo $row["NombreAl"] ?>" required>
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Apellido Paterno:</label>
                    <input name="appaterno" class="lectura" type="text" value="<?php echo $row["ApPaternoAl"] ?>" required>
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Apellido Materno:</label>
                    <input name="apmaterno" class="lectura" type="text" value="<?php echo $row["ApMaternoAl"] ?>">
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">CURP:</label>
                    <input name="curp" class="lectura" type="text" value="<?php echo $row["CURPAl"] ?>" required>
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Alergias:</label>
                    <input name="alergias" class="lectura" type="text" value="<?php echo $row["Alergias"] ?>">
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Nombre del tutor:</label>
                    <input name="nombretut" class="lectura" type="text" value="<?php echo $row["NombreTut"] ?>">
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Ap. Paterno del tutor:</label>
                    <input name="appaternotut" class="lectura" type="text" value="<?php echo $row["ApPaternoTut"] ?>">
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Ap. Materno del tutor:</label>
                    <input name="apmaternotut" class="lectura" type="text" value="<?php echo $row["ApMaternoTut"] ?>">
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">No. Teléfono del tutor:</label>
                    <input name="notel" class="lectura" type="number" value="<?php echo $row["NoTelefonoTut"] ?>">
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Fecha de Nacimiento</label>
                    <input name="nacimiento" class="lectura" type="date" value="<?php echo $row["FechaNacAl"] ?>" required>
                    <label class="desaparece"></label>
                    <label class="lectura_label" for="">Tipo de sangre:</label>
                    <select name="sangre" class="lectura">
                    <?php echo $opciones ?>
    <!--
                        <option value="--">--</option>
                        <option value="O-">O-</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
    -->
                    </select>
                    <label></label>
                    <center><input type="submit" value="Registrar" class="boton_a"></center>

                <?php } ?>

            </form>
    <?php } ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
