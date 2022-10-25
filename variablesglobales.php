<?php
$headerdoc = "
<div class='navbar'>
    <nav>
        <ul class='menu'>
            <li class='menuHijo'><a href='inicio.php'>Inicio</a></li>
            <li class='menuHijo'><a href='inventario.php'>Inventario</a>
                <ul class='submenu'>
                    <li><a href='inventario.php'>Ver todo</a></li>
                    <li><a href='crear_medicina.php'>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='consultas.php'>Consultas</a>
                <ul class='submenu'>
                    <li><a href='consultas.php'>Ver todas</a></li>
                    <li><a href='crear_consulta.php'>Nueva Consulta</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='alumnos.php'>Alumnos</a>
                <ul class='submenu'>
                    <li><a href='alumnos.php'>Ver todos</a></li>
                    <li><a href='crear_alumno.php?id='>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='doctores.php'>Doctores</a>
                <ul class='submenu'>
                    <li><a href='doctores.php'>Ver todos</a></li>
                    <li><a href='crear_doctor.php?id='>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='cierra.php'>Cerrar Sesión</a></li>
        </ul>
    <nav>
</div>
<div class='auxCuerpo'>            <li class='menuHijo'><a href='index.php'>Inicio</a></li>

";

$headersin = "
<div class='navbar'>
    <nav>
        <ul class='menu'>
            <li class='menuHijo'><a href='inicio.php'>Inicio</a></li>
            <li class='menuHijo'><a href='index.php'>Iniciar Sesión</a></li>
            <li class='menuHijo'><a href='doctores.php'>Doctores</a>
                <ul class='submenu'>
                    <li><a href='doctores.php'>Ver todos</a></li>
                    <li><a href='crear_doctor.php?id='>Registrar</a></li>
                </ul>
        </ul>
    <nav>
</div>
<div class='auxCuerpo'>
";

$headeralm = "
<div class='navbar'>
    <nav>
        <ul class='menu'>
            <li class='menuHijo'><a href='inicio.php'>Inicio</a></li>
            <li class='menuHijo'><a href='doctores.php'>Doctores</a>
                <ul class='submenu'>
                    <li><a href='doctores.php'>Ver todos</a></li>
                    <li><a href='crear_doctor.php?id='>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='cierra.php'>Cerrar Sesión</a></li>
        </ul>
    <nav>
</div>
<div class='auxCuerpo'>
";

/*$header = "
<div class='dropdown'>
    <button id='abrir-menu'>☰</button>
    <div class='dropdown-content'>
        <a class='primer_drop' href='index.php'>Inicio</a>
        <a class='primer_drop' href='inventario.php'>Inventario</a>
        <a class='primer_drop' href='consulta-inicio.php'>Añadir Consulta</a>
        <a class='primer_drop' href='consultas.php'>Historial de Consultas</a>
        <a class='primer_drop' class='primer_drop'a href='alumnos.php'>Historiales de Alumnos</a>
        <a class='primer_drop' href='registrar.php'>Registros</a>
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
";*/

$footer = "
</div>
    <div class='pie'>
        <div>
            <center><h1>ACSI</h1></center>
            <div class='div_final'>
                <img class='imagen_footer' src='imgs/icon_circulo.png'> 
                <div>
                    <h2>ACSI: ADMINISTRADOR DE CENTROS DE SALUD INSTITUCIONALES</h2>
                    <p>Elaborado por los alumnos del CETIS 120 <q>Josefa Ortíz de Dominguez</q></p>
                    <ul>
                        <li>José Roberto García Correa</li>
                        <li>Jorge Arturo Salgado Ceja</li>
                        <li>Edmundo Canedo Cervantes</li>
                    </ul>
                </div>
            </div>
        <div>
    </div>
";

$permisoDoctor = "
<h1>Necesitas ser doctor para ver esto</h1>
<center><a class='boton_a' onclick='regresar()'>VOLVER</a></center>
<center><img src='imgs/registro_fallido.png' class='imagen_logo'></center>
<script>
    function regresar(){
        history.back();
    }
</script>
";

/*
$headerdoc = "
<div class='navbar'>
    <nav>
        <ul class='menu'>
            <li class='menuHijo'><a href='index.php'>Inicio</a></li>
            <li class='menuHijo'><a href='inventario.php'>Inventario</a>
                <ul class='submenu'>
                    <li><a href='inventario.php'>Ver todo</a></li>
                    <li><a href='crear_medicina.php'>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='#'>Consultas</a>
                <ul class='submenu'>
                    <li><a href='consultas.php'>Ver todas</a></li>
                    <li><a href='crear_consulta.php'>Nueva Consulta</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='alumnos.php'>Alumnos</a>
                <ul class='submenu'>
                    <li><a href='alumnos.php'>Ver todos</a></li>
                    <li><a href='crear_alumno.php?id='>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='doctores.php'>Doctores</a>
                <ul class='submenu'>
                    <li><a href='doctores.php'>Ver todos</a></li>
                    <li><a href='crear_doctor.php?id='>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='#'>Preguntas</a>
                <ul class='submenu'>
                    <li><a href='#'>Ver todas</a></li>
                    <li><a href='#'>Faltan responder</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='#'>Blog</a>
                <ul class='submenu'>
                    <li><a href='#'>Ver blog</a></li>
                    <li><a href='#'>Crear entrada</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='cierra.php'>Cerrar Sesión</a></li>
        </ul>
    <nav>
</div>
<div class='auxCuerpo'>
";*/

/*$headersin = "
<div class='navbar'>
    <nav>
        <ul class='menu'>
            <li class='menuHijo'><a href='index.php'>Inicio</a></li>
            <li class='menuHijo'><a href='doctores.php'>Doctores</a>
                <ul class='submenu'>
                    <li><a href='doctores.php'>Ver todos</a></li>
                    <li><a href='crear_doctor.php?id='>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='#'>Blog</a>
                <ul class='submenu'>
                    <li><a href='#'>Ver blog</a></li>
                    <li><a href='#'>Crear entrada</a></li>
                </ul>
            </li>
        </ul>
    <nav>
</div>
<div class='auxCuerpo'>
";*/

/* $headeralm = " <div class='navbar'>
    <nav>
        <ul class='menu'>
            <li class='menuHijo'><a href='index.php'>Inicio</a></li>
            <li class='menuHijo'><a href='doctores.php'>Doctores</a>
                <ul class='submenu'>
                    <li><a href='doctores.php'>Ver todos</a></li>
                    <li><a href='crear_doctor.php?id='>Registrar</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='#'>Preguntas</a>
                <ul class='submenu'>
                    <li><a href='#'>Ver todas</a></li>
                    <li><a href='#'>Faltan responder</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='#'>Blog</a>
                <ul class='submenu'>
                    <li><a href='#'>Ver blog</a></li>
                    <li><a href='#'>Crear entrada</a></li>
                </ul>
            </li>
            <li class='menuHijo'><a href='cierra.php'>Cerrar Sesión</a></li>
        </ul>
    <nav>
</div>
<div class='auxCuerpo'>
";
*/