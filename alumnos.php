<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
$alumnos = "SELECT * FROM Alumnos where NoControl like '%%'";
$id = '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>HISTORIALES DE ALUMNOS</title>
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

    
        <h1>Historiales de Alumnos</h1>
        <input type="text" class="buscador_principal" id="buscador_tr" placeholder="Número de Control del Alumno" onkeyup="buscar($('#buscador_tr').val());">
        <center><a class="boton_a bordes" href="crear_alumno.php?id=">REGISTRAR NUEVO ALUMNO</a></center>
        <table id="tabla_tr">
            <tr>
                <th>No Control</th>
                <th>Nombre</th>
                <th></th>
            </tr>
            <?php $resultado = mysqli_query($conexion, $alumnos);
                while($row=mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><center><?php echo $row["NoControl"];?></center></td>
                    <td><center><?php echo $row["NombreAl"];?> <?php echo $row["ApPaternoAl"];?> <?php echo $row["ApMaternoAl"];?></center></td>
                    <td><center><a href="alumno.php?id=<?php echo $row["NoControl"];?>">Mostrar Historial</a></center></td>
                </tr> <?php } ?>
        </table>
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
            url:'buscador_alumno.php',
            success: function(data){
                document.getElementById('tabla_tr').innerHTML = data;
            }
        });
    }
</script>
</html>
