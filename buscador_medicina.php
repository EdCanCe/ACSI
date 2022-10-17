<?php
    include("conexion.php");
    if(!isset($_POST['entrada'])){$_POST['entrada'] = '';}
    if(!empty($_POST)){
        
        $aKeyword = explode(" ", $_POST['entrada']);
        
        $query = "SELECT * FROM medicina where NombreMed LIKE LOWER('%".$aKeyword[0]."%') OR ComponenteAct LIKE LOWER('%".$aKeyword[0]."%')";
        #https://youtu.be/yB95t3GsDxw?t=578 para cuando haga el buscador de medicinas por los espacios
        
        for($i = 1; $i < count($aKeyword); $i++){
            if(!empty($aKeyword[$i])){
                $query.= "OR NombreMed LIKE LOWER('%".$aKeyword[$i]."%') OR ComponenteAct LIKE LOWER('%".$aKeyword[$i]."%')";
            }
        }
        
        $resultado = mysqli_query($conexion, $query);
        
        if(mysqli_num_rows($resultado) > 0 ){
            
            while($row = $resultado->fetch_assoc()){
                
                echo"
                <div class='objeto_inventario'>
                    <div class='datos_objeto''>
                        <h2>".$row["NombreMed"]."</h2>
                        <div>
                            <p>Cantidad: ".$row["CantidadMedicina"]."</p>
                            <p>Medicina activa: ".$row["ComponenteAct"]."</p>
                            <p>Gramajes: ".$row["GramajeMed"]."</p>
                        </div>
                        <a  class='boton_a' href='medicamento.php?id=".$row["MedicinaID"]."'>Ver Medicamento</a>
                    </div>
                </div>";
                
            }
            
        }else if(mysqli_num_rows($resultado) <= 0 && $_POST['entrada'] != ''){
            echo '<center><p>No se encuentran datos</p></center>';
        }
    }
?>
