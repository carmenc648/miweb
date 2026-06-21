<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Soporte Técnico | EXPO</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

body{
background:#eef3f8;
display:flex;
}

/* MENU */

.sidebar{

width:280px;
height:100vh;

background:linear-gradient(
180deg,
#111827,
#1f2937
);

padding:40px 25px;

position:fixed;

left:0;
top:0;

}

.logo{

color:white;

font-size:42px;

font-weight:bold;

margin-bottom:50px;

}

.menu a{

display:block;

padding:18px;

margin-bottom:12px;

text-decoration:none;

color:white;

border-radius:14px;

}

.menu a:hover{

background:rgba(255,255,255,.1);

}

/* CONTENIDO */

.main{

margin-left:280px;

padding:35px;

width:100%;

}

.top{

background:white;

padding:30px;

border-radius:25px;

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:30px;

}

.user{

background:#dbeafe;

padding:18px;

border-radius:18px;

color:#1d4ed8;

font-weight:bold;

}

/* TARJETAS */

.stats{

display:grid;

grid-template-columns:repeat(4,1fr);

gap:20px;

margin-bottom:30px;

}

.card{

background:white;

padding:25px;

border-radius:25px;

box-shadow:0 8px 20px rgba(0,0,0,.05);

}

.card h2{

font-size:35px;

margin-top:10px;

color:#2563eb;

}

/* OPCIONES */

.grid{

display:grid;

grid-template-columns:repeat(2,1fr);

gap:25px;

}

.box{

background:white;

padding:30px;

border-radius:25px;

box-shadow:0 8px 20px rgba(0,0,0,.05);

}

.option{

background:#f8fafc;

padding:18px;

margin-top:15px;

border-left:6px solid #2563eb;

border-radius:15px;

}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">

🛠 SOPORTE

</div>

<div class="menu">

<a href="{{ route('soporte.usuarios') }}">
👥 Usuarios
</a>

<a href="">
🔑 Contraseñas
</a>

<a href="{{ route('soporte.roles') }}">
📋 Roles
</a>

<a href="">
📦 Backups
</a>

<a href="">
⚙ Configuración
</a>

<form action="{{ route('logout') }}"
method="POST">

@csrf

<button style="
width:100%;
padding:15px;
border:none;
border-radius:15px;
background:#ef4444;
color:white;
margin-top:20px;
">

Cerrar sesión

</button>

</form>

</div>

</div>


<div class="main">

<div class="top">

<div>

<h1>

Panel Soporte Técnico

</h1>

<br>

Sistema EXPO

</div>

<div class="user">

👨‍💻

{{ auth()->user()->name }}

</div>

</div>


<div class="stats">

<div class="card">

Usuarios

<h2>

{{ $totalUsuarios }}

</h2>

</div>

<div class="card">

Empleados

<h2>

{{ $totalEmpleados }}

</h2>

</div>

<div class="card">

Vacaciones

<h2>

{{ $totalVacaciones }}

</h2>

</div>

<div class="card">

Permisos

<h2>

{{ $totalPermisos }}

</h2>

</div>

</div>


<div class="grid">

<div class="box">

<h2>

Mantenimiento

</h2>

<div class="option">

Restablecer contraseñas

</div>

<div class="option">

Revisar errores

</div>

<div class="option">

Usuarios bloqueados

</div>

</div>


<div class="box">

<h2>

Sistema

</h2>

<div class="option">

Configuración general

</div>

<div class="option">

Backups

</div>

<div class="option">

Auditoría

</div>

</div>

</div>

</div>

</body>
</html>