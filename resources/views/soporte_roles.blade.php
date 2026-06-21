<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Roles</title>

<style>

body{
background:#eef3f8;
padding:40px;
font-family:Segoe UI;
}

.card{
background:white;
padding:30px;
border-radius:25px;
}

table{
width:100%;
border-collapse:collapse;
}

th{
background:#1e3a8a;
color:white;
padding:18px;
}

td{
padding:20px;
border-bottom:1px solid #ddd;
}

select{
padding:12px;
border-radius:10px;
}

button{
padding:12px 18px;
border:none;
background:#2563eb;
color:white;
border-radius:10px;
}

</style>

</head>

<body>

<div class="card">

<h1>
Gestión de Roles
</h1>

<br>

<table>

<tr>

<th>Usuario</th>

<th>Correo</th>

<th>Rol</th>

<th>Acción</th>

</tr>

@foreach($usuarios as $usuario)

<tr>

<td>
{{ $usuario->name }}
</td>

<td>
{{ $usuario->email }}
</td>

<td>

<form method="POST"
action="{{ route('soporte.roles.guardar',$usuario->id) }}">

@csrf

<select name="rol">

<option value="admin">

Admin

</option>

<option value="empleado">

Empleado

</option>

<option value="programador">

Programador

</option>

</select>

</td>

<td>

<button>

Guardar

</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

</body>

</html>