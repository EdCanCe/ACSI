<?php
$header = "
<div class='dropdown'>
    <button id='abrir-menu'>☰</button>
    <div class='dropdown-content'>
        <a href='index.php'>Inicio</a>
        <a href='inventario.php'>Inventario</a>
        <a href='consulta-inicio.php'>Añadir Consulta</a>
        <a href='consultas.php'>Historial de Consultas</a>
        <a href='alumnos.php'>Historiales de Alumnos</a>
        <a href='registrar.php'>Registros</a>
        <a><input type='text' class='In-control' placeholder='Buscar Alumno por No.Control' id='buscador_inicio'></a>
    </div>
</div>
<script>
    var nc = document.getElementById('buscador_inicio');
    nc.addEventListener('keypress', function(event) {   
    if (event.keyCode == 13)
            window.location.href = 'alumno.php?id='+nc.value;
    });
</script>
<div class='auxCuerpo'>
";

$footer = "
</div>
    <div class='pie'>
        <h1>ACSI</h1>
    </div>
";