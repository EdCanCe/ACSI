<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>NUEVA CONSULTA</title>
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
        <h1>Nueva consulta</h1>
        <form action="insertarconsulta.php" method="post" class="registrardatos">
            <label class="lectura_label" for="">No. Control</label>
            <select name="NoControlFK" class="lectura" required>
                <option value="" selected disabled>--</option>
                <?php 
                $resultado = mysqli_query($conexion, "SELECT NoControl, NombreAl FROM Alumnos");
                while($row=mysqli_fetch_assoc($resultado)) {
                    ?>
                    <option value="<?php echo $row["NoControl"] ?>"><?php echo $row["NoControl"] ?> - <?php echo $row["NombreAl"] ?></option>
                    <?php }
                ?>
            </select>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Temperatura Actual</label>
            <input name="Temperatura" class="lectura" type="number" step="0.01" min="25" placeholder="En grados celsius" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Peso Actual</label>
            <input name="Peso" class="lectura" type="number" step="0.01" min="25" placeholder="En kilogramos" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Altura Actual</label>
            <input name="Altura" class="lectura" type="number" step="0.01" placeholder="En metros" required>
            <label class="desaparece"></label>
            
            
            <label class="lectura_label" for="">Padecimientos</label>
            <input name="Padecimientos" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Diagnóstico</label>
            <input name="Diagnostico" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Tratamiento</label>
            <input name="Tratamiento" class="lectura" type="text" required>
            <label class="desaparece"></label>
            
            
            <label class="lectura_label" for="">Medicamento administrado</label>
            <select name="MedicinaFK" id="tipomed" class="lectura">
                <option value="" selected disabled>--</option>
                <?php 
                $resultado = mysqli_query($conexion, "SELECT NombreMed FROM Medicina");
                while($row=mysqli_fetch_assoc($resultado)) {
                    ?>
                    <option value="<?php echo $row["NombreMed"] ?>"><?php echo $row["NombreMed"] ?></option>
                    <?php }
                ?>
            </select>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Cantidad administrada</label>
            <input class="lectura" id="cantidadId" type="number" step="0.01">
            <input name="Cantidad" id="cantidadAdd" type="text" readonly style="display: none">
            <label class="desaparece"></label>
            <label class="desaparece"></label>
            <center><button class="boton_a" id="botonMed" >Añadir a la lista</button></center>
            <label class="desaparece"></label>
            <label class="desaparece"></label>
            <div style="border: 2px solid var(--color_obscuro); border-radius: 5px; margin: 20px 0px;">
                <center id="contenedor_number">
                    <h3>Lista de medicinas administradas:</h3>
                </center>
            <!-- Aquí se le meten los datos de las medicinas a introducir -->
            </div>
            <label class="desaparece"></label>
            
            <center><input type="submit" value="Registrar" class="boton_a"></center>
        </form>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

<script>
    
    var boton = document.getElementById("botonMed");
    boton.addEventListener("click", function(){
        event.preventDefault();
        var pasar = document.getElementById("cantidadAdd");
        var tipo = document.getElementById("tipomed");
        var cantidad = document.getElementById("cantidadId");
        if(tipo.value=="" || cantidad.value==""){
            alert("El tipo de medicina o su cantidad está vacía");
        }else{
            document.getElementById("contenedor_number").insertAdjacentHTML("beforeend","<p>"+tipo.value+" - "+cantidad.value+"</p>");
            pasar.value=""+pasar.value+" "+tipo.value+"-"+cantidad.value;
            cantidad.value="";
            tipo.value="";
        }
    });

    
</script>
    
</html>
