<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nuevo Usuario | EXPO</title>

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
justify-content:center;
align-items:center;
height:100vh;
}

.card{

background:white;
width:550px;
padding:40px;
border-radius:25px;
box-shadow:0 10px 25px rgba(0,0,0,.08);

}

h1{

text-align:center;
margin-bottom:30px;
color:#1f2937;

}

label{

display:block;
margin-top:15px;
margin-bottom:8px;
font-weight:bold;
color:#374151;

}

input,select{

width:100%;
padding:14px;
border:1px solid #d1d5db;
border-radius:12px;
font-size:15px;

}

input:focus,
select:focus{

outline:none;
border-color:#2563eb;

}

.btn{

width:100%;
padding:15px;
border:none;
border-radius:12px;
margin-top:25px;
font-size:16px;
font-weight:bold;
cursor:pointer;

}

.guardar{

background:#2563eb;
color:white;

}

.guardar:hover{

background:#1d4ed8;

}

.volver{

display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#6b7280;

}

</style>

</head>

<body>

<div class="card">

<h1>➕ Crear Usuario</h1>

<form action="{{ route('soporte.usuarios.guardar') }}" method="POST">

@csrf

<label>Nombre</label>
<input type="text" name="name" required>

<label>Correo</label>
<input type="email" name="email" required>

<label>Contraseña</label>
<input type="password" name="password" required>

<label>Rol</label>
<select name="rol" required>
<option value="admin">Administrador</option>
<option value="empleado">Empleado</option>
<option value="programador">Programador</option>
</select>

<button type="submit" class="btn guardar">
Guardar Usuario
</button>

</form>

<a href="{{ route('soporte.usuarios') }}" class="volver">
⬅ Regresar
</a>

</div>

</body>
</html>