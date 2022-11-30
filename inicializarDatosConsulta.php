<?php
    include("conexion.php");
    session_start();
    if(!isset($_POST['NoControlFK'])){$_POST['NoControlFK'] = '';}
    if(!empty($_POST)){
        $noControl = $_POST['NoControlFK'];
        $enviar = "";
        $resultado = mysqli_query($conexion, "SELECT MAX( NoConsulta ) as este FROM Receta where NoControlFK = $noControl");
        
        if(mysqli_num_rows($resultado) == 0){
            echo "";
        }else{
            while($row = $resultado->fetch_assoc()){
                $lim = $row["este"];
            }
            $resultado2 = mysqli_query($conexion, "select * from Receta where NoConsulta = $lim");
            while($row = $resultado2->fetch_assoc()){
                $enviar.=$row["PesoPaciente"]." ".$row["Altura"];
            }
            echo $enviar;
        }
    }
?>
