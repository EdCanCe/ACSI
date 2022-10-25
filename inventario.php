<?php
include("variablesglobales.php");
session_start();
include("conexion.php");
$inventario = "SELECT * FROM Medicina;";
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>INVENTARIO</title>
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


        <h1>Inventario</h1>
        <input type="text" class="buscador_principal" id="buscador_tr" placeholder="Nombre o componentes del medicamento" onkeyup="buscar($('#buscador_tr').val());">
        <div class="inventario" id="inventariocontainer">
            <?php $resultado = mysqli_query($conexion, $inventario);
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                <div class="objeto_inventario">
                    <div class="datos_objeto">
                        <h2><?php echo $row["NombreMed"] ?></h2>
                        <div>
                            <p>Cantidad: <?php echo $row["CantidadMedicina"] ?></p>
                            <p>Medicina activa: <?php echo $row["ComponenteAct"] ?>
                            <p>Gramajes: <?php echo $row["GramajeMed"] ?></p>
                        </div>
                        <a  class="boton_a" href="medicamento.php?id=<?php echo $row["MedicinaID"] ?>">Ver Medicamento</a>
                    </div>
                </div> <?php } ?>
        </div>
        <?php } ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>
<script type="text/javascript">
    function buscar(entrada){
        var datos = {"entrada":entrada};
        $.ajax({
            data:datos,
            type: 'POST',
            url:'buscador_medicina.php',
            success: function(data){
                document.getElementById('inventariocontainer').innerHTML = data;
            }
        });
    }
</script>
</html>
