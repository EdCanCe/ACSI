<?php
include("conexion.php");
session_start();
include("variablesglobales.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>CALORIAS POR DÍA</title>
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


	<div>

		<h1>Calculadora de Calorías por día</h1>
		<form class="registrardatos">
            <label class="lectura_label" for="">Edad:</label>
            <input id="ed" class="lectura" type="number" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Altura en cms:</label>
            <input id="al" class="lectura" type="number" required>
            <label class="desaparece"></label>

            <label class="lectura_label" for="">Peso en KG:</label>
            <input id="pe" class="lectura" type="number">
            <label class="desaparece"></label>
    </form>

            <form name="formu">
        <select id="_datos">
            <option disabled>
                --
            </option>
			<option value="1">
			Hombre
            </option>
			<option value="2">
			Mujer	
			</option>
		</select>
    </form>

		<center><button onclick="calorias()" class="boton_a"><span>Poco o ningun ejercicio</span></button><br></center>
		<center><button onclick="calorias1()" class="boton_a">Ejercicio ligero (1-3 días a la semana)</button><br></center>
		<center><button onclick="calorias2()" class="boton_a">Ejercicio moderado (3-5 días a la semana)</button><br></center>
		<center><button onclick="calorias3()" class="boton_a">Ejercicio fuerte (6-7 días a la semana)</button><br></center>
		<center><button onclick="calorias4()" class="boton_a">Ejercicio muy fuerte (Todos los días, dos veces)</button><br></center>

		<p id="txt"></p>

	</div>

    <table>
     <tr>
     <th colspan="3">Cereales y Tubérculos</th>
     </tr>
        
     <tr>
     <td>Arroz blanco cocido</td>
     <td>1/2 taza</td>
     <td>70 kcal</td>
     </tr>
        
     <tr>
     <td>Tortilla de maíz</td>
     <td>1 pieza</td>
     <td>70 kcal</td>
     </tr>
        
    <tr>
    <td>Bolillo sin migajón</td>
    <td>1/2 pieza</td>
    <td>70 kcal</td>
    </tr>
        
    <tr>
    <td>Pan de caja (Blanco o integral)</td>
    <td>1/2 pieza</td>
    <td>70 kcal</td>
    </tr>
        
    <tr>
    <td>Pasta hervida</td>
    <td>1/2 pieza</td>
    <td>70 kcal</td>
    </tr>
        
    <tr>
    <td>Cereal con azúcar</td>
    <td>1/3 de taza</td>
    <td>70 kcal</td>
    </tr>
    
    <tr>
    <td>Papa (hervida o al horno)</td>
    <td>1/2 pieza</td>
    <td>70 kcal</td>
    </tr>
        
    <tr>
    <td>Galleta maría</td>
    <td>5 piezas</td>
    <td>70 kcal</td>
    </tr>
        
    <tr>
    <td>Pan dulce (cuernito, concha)</td> 
    <td>1 pieza</td>
    <td>115 kcal</td>
    </tr>
        
    <tr>
    <th  colspan="3">Verduras</th>
    </tr>
        
    <tr>
    <td>Jitomate bola</td>
    <td>1 pieza</td>
    <td>25 kcal</td>
    </tr>
        
    <tr>
    <td>Cebolla blanca cruda</td>   
    <td>1/2 taza</td>
    <td>25 kcal</td>
    </tr>
    
    <tr>
    <td>Chile de árbol</td>
    <td>4 piezas</td>
    <td>25 kcal</td>
    </tr>
        
    <tr>
    <td>Zanahoria cruda</td>
    <td>1/2 taza</td>
    <td>25 kcal</td>
    </tr>
        
    <tr>
    <td>Calabacita cocida</td>
    <td>1/2 taza</td>
    <td>25 kcal</td>
    </tr>
        
    <tr>
    <td>Chayote cocido</td>
    <td>1/2 pieza</td>
    <td>25 kcal</td>
    </tr>
        
    <tr>
    <td>Espinaca cruda</td>
    <td>2 tazas</td>
    <td>25 kcal</td>
    </tr>
        
    <tr>
    <th  colspan="3">Alimentos de origen animal</th>    
    </tr>
        
    <tr>
    <td>Bistec de res</td>
    <td>30 gramos</td>
    <td>40 kcal</td>
    </tr>
        
    <tr>
    <td>Pechuga de pollo azada</td>
    <td>30 gramos</td>
    <td>40 kcal</td>
    </tr>
    
    <tr>
    <td>Blanco de nilo (pescado)</td>
    <td>40 gramos</td>
    <td>40 kcal</td>
    </tr>
        
    <tr>
    <td>Atún de pescado</td>
    <td>40 gramos</td>
    <td>40 kcal</td>
    </tr>
        
    <tr>
    <td>Pechuga de pavo</td> 
    <td>2 rebanadas</td>
    <td>40 kcal</td>
    </tr>
        
    <tr>
    <td>Pierna de cerdo</td>
    <td>40 gramos</td>
    <td>55 kcal</td>
    </tr>    
        
    <tr>
    <td>Queso fresco</td>
    <td>40 gramos</td>
    <td>55 kcal</td>
    </tr>
        
    <tr>
    <td>Queso panela</td>
    <td>40 gramos</td>
    <td>55 kcal</td>
    </tr>
    
    <tr>
    <td>Queso Oaxaca</td>
    <td>30 gramos</td>
    <td>55 kcal</td>
    </tr>
        
    <tr>
    <td>Jamon de pavo y/o pierna</td>
    <td>2 rebanadas</td>
    <td>55 kcal</td>
    </tr>
        
    <tr>
    <th  colspan="3">Leche y derivados</th>    
    </tr>
        
    <tr>
    <td>Leche entera</td>
    <td>1 taza</td>
    <td>150 kcal</td>
    </tr>
        
    <tr>
    <td>Leche descremada</td>
    <td>1 taza</td>
    <td>95 kcal</td>
    </tr>
        
    <tr>
    <td>Leche evaporada</td>
    <td>1/4 de taza</td>
    <td>150 kcal</td>
    </tr>
        
    <tr>
    <td>Yogurt natural</td>
    <td>1 taza</td>
    <td>150 kcal</td>
    </tr>
        
    <tr>
    <th  colspan="3">Leguminosas</th>    
    </tr>
        
    <tr>
    <td>Frijol</td>
    <td>1/2 taza</td>
    <td>120 kcal</td>
    </tr>
        
    <tr>
    <td>Garbanzo</td>
    <td>1/2 taza</td>
    <td>120 kcal</td>
    </tr>
        
    <tr>
    <td>Habas</td>
    <td>1/2 taza</td>
    <td>120 kcal</td>
    </tr>
        
    <tr>
    <td>Lentejas</td>
    <td>1/2 taza</td>
    <td>120 kcal</td>
    </tr>
    </table>
	
</div>

<?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>

</body>
</html>
