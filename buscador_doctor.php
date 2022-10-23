<?php
    include("conexion.php");
    if(!isset($_POST['entrada'])){$_POST['entrada'] = '';}
    if(!empty($_POST)){
        
        $aKeyword = explode(" ", $_POST['entrada']);
        
        $query = "SELECT * FROM Doctor where CedulaProf LIKE '%".$_POST['entrada']."%'";
        #https://youtu.be/yB95t3GsDxw?t=578 para cuando haga el buscador de medicinas por los espacios
        
        $resultado = mysqli_query($conexion, $query);
        
        if(mysqli_num_rows($resultado) > 0 ){
            echo '<table class="tabla_alumnos">
            <tr>
                <th>Cedula Prof.</th>
                <th>Nombre</th>
                <th></th>
            </tr>';
            
            while($row = $resultado->fetch_assoc()){
                echo"<tr>
                <td><center>".$row["CedulaProf"]."</center></td>
                <td><center>".$row["NombreDoc"]." ".$row["ApPaternoDoc"]." ".$row["ApMaternoDoc"]."</center></td>
                <td><center><a href='doctor.php?id=".$row["CedulaProf"]."'>Mostrar datos</a></center></td>
                </tr>";
            }
            
            echo '</table>';
            
        }else if(mysqli_num_rows($resultado) <= 0 && $_POST['entrada'] != ''){
            echo '<center><p>No se encuentran datos</p></center>';
        }
    }
?>
