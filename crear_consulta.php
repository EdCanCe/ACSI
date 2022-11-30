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


        <h1>Nueva consulta</h1>
        <form action="insertarconsulta.php" method="post" class="registrardatos">
            <label class="lectura_label" for="">No. Control</label>
            <select name="NoControlFK" class="lectura" id="selectNoControl" required>
                <option value="" selected disabled>--</option>
                <?php 
                $resultado = mysqli_query($conexion, "SELECT NoControl, NombreAl, ApPaternoAl, ApMaternoAl FROM Alumnos");
                while($row=mysqli_fetch_assoc($resultado)) {
                    ?>
                    <option value="<?php echo $row["NoControl"] ?>"><?php echo $row["NoControl"] ?> - <?php echo $row["NombreAl"] ?> <?php echo $row["ApPaternoAl"] ?> <?php echo $row["ApMaternoAl"] ?></option>
                    <?php }
                ?>
            </select>
            <label class="desaparece"></label>
            <label class="desaparece"></label>
            <iframe id="showData"></iframe>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Temperatura Actual</label>
            <input name="Temperatura" class="lectura" type="number" step="0.01" min="25" max="45" placeholder="En grados celsius" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Peso Actual</label>
            <input name="Peso" id="pesoAux" class="lectura" type="number" step="0.01" min="25" max="250" placeholder="En kilogramos" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Estatura Actual</label>
            <input name="Altura" id="alturaAux" class="lectura" type="number" step="0.01" placeholder="En metros" min="1.2" max="2.3" required>
            <label class="desaparece"></label>
            
            
            <label class="lectura_label" for="">Padecimientos</label>
            <input name="Padecimientos" class="lectura" type="text" required>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Diagnóstico</label>
            <input name="Diagnostico" class="lectura" type="text" required>
            <label class="desaparece"></label>
            
            
            
            <label class="lectura_label" for="">Medicamento administrado</label>
            <select name="MedicinaFK" id="tipomed" class="lectura">
                <option value="" selected disabled>--</option>
                <?php 
                $resultado = mysqli_query($conexion, "SELECT NombreMed, CantidadMedicina FROM Medicina");
                while($row=mysqli_fetch_assoc($resultado)) {
                    ?>
                    <option value="<?php echo $row["NombreMed"] ?>"><?php echo $row["NombreMed"] ?> - Cantidad: <?php echo $row["CantidadMedicina"] ?></option>
                    <?php }
                ?>
            </select>
            <label class="desaparece"></label>
            <label class="lectura_label" for="">Unidades administradas</label>
            <input class="lectura" id="cantidadId" type="number" step="1">
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
            
            <label class="lectura_label" for="">Tratamiento</label>
            <input name="Tratamiento" class="lectura" type="text" required>
            <label class="desaparece"></label>

            <center><input type="submit" value="Registrar" class="boton_a"></center>
        </form>
        <?php } ?>
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
            
            if (confirm('¿Ya revisaste que no sea alérgico a eso o estás seguro en añadirlo?')) {
                let redondeado = Math.ceil( cantidad.value );
                document.getElementById("contenedor_number").insertAdjacentHTML("beforeend","<p>"+tipo.value+" - "+redondeado+"</p>");
                pasar.value=""+pasar.value+" "+tipo.value+"-"+redondeado;
                cantidad.value="";
                tipo.value="";
            }
        }
    });

    function buscar(NoControlFK){
        var datos = {"NoControlFK":NoControlFK};
        $.ajax({
            data:datos,
            type: 'POST',
            url:'inicializarDatosConsulta.php',
            success: function(data){
                var peso="", altura="";
                let usar = ""+data;
                for(let i=0; i<usar.length;i++){
                    peso=peso+=usar[i];
                    if(usar[i]==' '){
                        for(; i<usar.length;i++){
                            altura=altura+usar[i];
                        }
                    }
                }
                document.getElementById("pesoAux").value = parseFloat(peso);
                document.getElementById("alturaAux").value = parseFloat(altura);
            }
        });
    }

    document.getElementById('selectNoControl').addEventListener('change',function() {

        let prueba = document.getElementById('selectNoControl').value;
        document.getElementById("showData").style = "height: 6cm;";
        document.getElementById("showData").src=("rawData.php?id="+prueba);

        buscar(document.getElementById('selectNoControl').value);
    });

</script>
    
</html>
