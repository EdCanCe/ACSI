<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>IMC</title>
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

            <h1>Calculadora de IMC</h1>
                
            <form class="registrardatos" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <label class="lectura_label" for="">Peso en KG:</label>
                    <input name="peso" class="lectura" type="number" required>
                    <label class="desaparece"></label>

                    <label class="lectura_label" for="">Altura en mts:</label>
                    <input name="altura" class="lectura" type="number" min="0.3" max="2.3" step="0.01" required>
                    <label class="desaparece"></label>

                    <center><input type="submit" value="Calcular IMC" class="boton_a" name="calimc"></center>

            </form>

            <?php
                        if(isset($_POST['calimc'])){
                        $peso = $_POST['peso'];
                        $altura = $_POST['altura'];
                        $imc = ($peso/($altura*$altura));
                        $IMC = bcdiv($imc, '1', 2);
                        echo "<p>Tu IMC es:$IMC</p>";
                        

                        if(0<=$IMC and $IMC<=18.5){
                            echo $IMC1;
                        }

                        else if($IMC<=24.9){
                            echo $IMC2;
                        }

                        else if($IMC<=29.9){
                            echo $IMC3;
                        }

                        else{
                            echo $IMC4;
                        }
                        }
                    ?>

        </div>
        <?php //ESTE HACE EL FOOTER
                echo $footer;
            ?>

    </body>
</html>
