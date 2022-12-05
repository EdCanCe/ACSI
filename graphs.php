<?php
include("variablesglobales.php");
session_start();
include("conexion.php");
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
        
            <h1>Gráficas</h1>

            <center><a class="boton_a" href="#mes">Visitas por mes</a>
            <center><a class="boton_a" href="#visitas">Alumnos con más visitas</a>
            <center><a class="boton_a" href="#meds">Medicamentos más usados</a>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <h2 id="mes">Visitas por mes</h2>
            <div id="graph_1" style="width: 100%; height: 500px"></div>
            <h2 id="visitas">Alumnos con más visitas</h2>
            <div id="graph_3" style="width: 100%; height: 500px"></div>
            <h2 id="meds">Medicamentos más usados</h2>
            <div id="graph_4" style="width: 100%; height: 500px"></div>

            <?php
                $fechaAntigua = date('y-m-d', strtotime('-32 days'));
                $meterg1 = "['Fecha', 'Idas']";
                $ultima = $fechaAntigua;
                $ultima = date('y-m-d', strtotime($ultima.'+1 days'));
                $linea = ", \n['".$ultima."',  0]";
                $resultado = mysqli_query($conexion, "SELECT * FROM Receta");
                $resultado2 = mysqli_query($conexion, "select count(*) as Cantidad, DATE_FORMAT(Fecha,'%y-%m-%d') as FechaS FROM Receta where Fecha >= '$fechaAntigua' GROUP BY DATE_FORMAT(Fecha,'%y-%m-%d')");
                while($row=mysqli_fetch_assoc($resultado2)) {        
                while($ultima < date('y-m-d', strtotime($row["FechaS"].'+0 days'))){
                    $linea = ", \n['".$ultima."',  0]";
                    $meterg1.= $linea;
                    $ultima = date('y-m-d', strtotime($ultima.'+1 days'));
                }
                $fechaMeter = $row["FechaS"];
                $cantidadMeter = $row["Cantidad"];
                $linea = ", \n['".$fechaMeter."',  ".$cantidadMeter."]";
                $meterg1.= $linea;
                $ultima = date('y-m-d', strtotime($ultima.'+1 days'));
                }
                while($ultima < date('y-m-d')){
                    $linea = ", \n['".$ultima."',  0]";
                    $meterg1.= $linea;
                    $ultima = date('y-m-d', strtotime($ultima.'+1 days'));
                }
            ?>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    <?php echo $meterg1 ?>
                    ]);
                    var options = {
                        title: 'Visitas últimos 30 días',
                        curveType: 'linear',
                        legend: { position: 'bottom' },
                        lineWidth: 2,
                        colors: ['#004d06'],
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('graph_1'));
                    chart.draw(data, options);
                }
            </script>


            <?php
                $contador=0;
                $meterg1 = "['Alumno', 'Idas', {role: 'style'}]";
                $resultado = mysqli_query($conexion, "SELECT * FROM Receta");
                $resultado2 = mysqli_query($conexion, "select count(*) as Cantidad, NoControlFK FROM Receta GROUP BY NoControlFK order by Cantidad DESC");
                while($row=mysqli_fetch_assoc($resultado2)) {       
        
                    $meterg1.=", \n['". $row["NoControlFK"] ."',". $row["Cantidad"] .", '#004d06']";
                    $contador = $contador+1;
                    if($contador >= 10) break;
                }
            ?>
            <script type="text/javascript">
                /*google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    
                    ]);
                    var options = {
                        title: 'Visitas por alumno',
                        curveType: 'linear',
                        legend: { position: 'bottom' },
                        lineWidth: 2,
                        colors: ['#004d06'],                        
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('graph_3'));
                    chart.draw(data, options);
                }*/

                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        <?php echo $meterg1 ?>
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation" },
                                    2]);

                    var options = {
                        title: "10 alumnos con más visitas",
                        width: 700,
                        height: 400,
                        bar: {groupWidth: "70%"},
                        legend: { position: "none" },

                    };
                    var chart = new google.visualization.BarChart(document.getElementById("graph_3"));
                    chart.draw(view, options);
                }
            </script>


            <?php
                $contador=0;
                $meterg1 = "['Medicina', 'Dosis', {role: 'style'}]";
                $resultado = mysqli_query($conexion, "SELECT * FROM CantidadesMed");
                $resultado2 = mysqli_query($conexion, "select count(*) as Cantidad, MedicinaIDFK FROM CantidadesMed GROUP BY MedicinaIDFK order by Cantidad DESC");
                while($row=mysqli_fetch_assoc($resultado2)) { 

                    $med="";
                    $resultado3 = mysqli_query($conexion, "SELECT NombreMed FROM Medicina where MedicinaID = ".$row["MedicinaIDFK"]." ");
                    while($row2=mysqli_fetch_assoc($resultado3)){
                        $med=$row2["NombreMed"];
                    }
        
                    $meterg1.=", \n['". $med ."',". $row["Cantidad"] .", '#004d06']";
                    $contador = $contador+1;
                    if($contador >= 15) break;
                }
            ?>
            <script type="text/javascript">
                /*google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    
                    ]);
                    var options = {
                        title: 'Visitas por alumno',
                        curveType: 'linear',
                        legend: { position: 'bottom' },
                        lineWidth: 2,
                        colors: ['#004d06'],                        
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('graph_3'));
                    chart.draw(data, options);
                }*/

                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        <?php echo $meterg1 ?>
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation" },
                                    2]);

                    var options = {
                        title: "15 medicinas más usadas",
                        width: 700,
                        height: 500,
                        bar: {groupWidth: "70%"},
                        legend: { position: "none" },

                    };
                    var chart = new google.visualization.BarChart(document.getElementById("graph_4"));
                    chart.draw(view, options);
                }
            </script>


        <?php } ?>
	</div>
    
    <?php //ESTE HACE EL FOOTER
        echo $footer;
    ?>
    
</body>

</html>
