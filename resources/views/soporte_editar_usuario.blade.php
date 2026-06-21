<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>

Editar Usuario

</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

body{

background:#eef3f8;

padding:50px;

display:flex;

justify-content:center;

align-items:center;

min-height:100vh;

}

.card{

background:white;

width:700px;

padding:45px;

border-radius:30px;

box-shadow:0 10px 25px rgba(0,0,0,.05);

}

h1{

margin-bottom:35px;

font-size:55px;

}

label{

display:block;

margin-top:20px;

margin-bottom:10px;

font-size:22px;

}

input,
select{

width:100%;

padding:18px;

border:1px solid #ccc;

border-radius:18px;

font-size:18px;

}

button{

margin-top:30px;

width:100%;

padding:18px;

border:none;

border-radius:18px;

background:#2563eb;

color:white;

font-size:20px;

cursor:pointer;

font-weight:bold;

}

button:hover{

background:#1d4ed8;

}

.back{

display:block;

text-align:center;

margin-top:25px;

text-decoration:none;

font-size:20px;

color:#2563eb;

}

</style>

</head>

<body>

<div class="card">

<h1>

Editar usuario

</h1>

<form method="POST"
action="{{ route('soporte.usuarios.actualizar',$usuario->id) }}">

@csrf

<label>

Nombre

</label>

<input
type="text"
name="name"
value="{{ $usuario->name }}"
required>

<label>

Correo

</label>

<input
type="email"
name="email"
value="{{ $usuario->email }}"
required>

<label>

Rol

</label>

<select name="rol">

<option
value="admin"
{{ strtolower($usuario->rol)=='admin' ? 'selected':'' }}>

Admin

</option>

<option
value="empleado"
{{ strtolower($usuario->rol)=='empleado' ? 'selected':'' }}>

Empleado

</option>

<option
value="programador"
{{ strtolower($usuario->rol)=='programador' ? 'selected':'' }}>

Programador

</option>

</select>
<label>

Puesto de trabajo

</label>

<input
type="text"
name="puesto"
value="{{ $usuario->puesto ?? '' }}"
placeholder="Ej: Recursos Humanos">

<label>

Nueva contraseña

</label>

<input
type="password"
name="password"
placeholder="Opcional">


<button type="submit">

Guardar cambios

</button>

</form>

<a
href="{{ route('soporte.usuarios') }}"
class="back">

← Regresar

</a>

</div>

</body>

</html>