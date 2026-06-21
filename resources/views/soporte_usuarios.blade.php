<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Usuarios | Soporte Técnico</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI;
}

body{
background:#eef3f8;
padding:40px;
}

.header{
background:linear-gradient(90deg,#111827,#1f2937);
padding:35px;
border-radius:25px;
color:white;
margin-bottom:30px;
}

.card{
background:white;
padding:30px;
border-radius:25px;
box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.actions-top{
margin-bottom:25px;
display:flex;
gap:15px;
flex-wrap:wrap;
}

.btn-top{
color:white;
padding:14px 25px;
border-radius:14px;
text-decoration:none;
font-weight:bold;
display:inline-block;
}

.nuevo{
background:#2563eb;
}

.menu{
background:#64748b;
}

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

th{
background:#1e3a8a;
color:white;
padding:18px;
text-align:left;
}

td{
padding:18px;
border-bottom:1px solid #ddd;
}

.badge{
padding:10px 15px;
border-radius:20px;
font-weight:bold;
display:inline-block;
}

.admin{
background:#dbeafe;
color:#1d4ed8;
}

.empleado{
background:#dcfce7;
color:#15803d;
}

.programador{
background:#f3e8ff;
color:#7e22ce;
}

.btn{
padding:10px 15px;
border:none;
border-radius:12px;
cursor:pointer;
font-weight:bold;
text-decoration:none;
}

.editar{
background:#dbeafe;
color:#2563eb;
}

.eliminar{
background:#fee2e2;
color:#dc2626;
}
</style>

</head>

<body>

<div class="header">
<h1>👥 Usuarios del Sistema</h1>
<br>
Panel Soporte Técnico
</div>

<div class="card">

<div class="actions-top">

<a href="{{ route('soporte.usuarios.nuevo') }}" class="btn-top nuevo">
➕ Nuevo Usuario
</a>

<a href="{{ route('soporte') }}" class="btn-top menu">
🏠 Menú Soporte
</a>

</div>

<table>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Correo</th>
<th>Rol</th>
<th>Acciones</th>
</tr>

@foreach($usuarios as $usuario)

<tr>
<td>{{ $usuario->id }}</td>
<td>{{ $usuario->name }}</td>
<td>{{ $usuario->email }}</td>

<td>
<span class="badge {{ strtolower($usuario->rol) }}">
{{ $usuario->rol }}
</span>
</td>

<td>
<a href="{{ route('soporte.usuarios.editar', $usuario->id) }}" class="btn editar">
Editar
</a>

<form action="{{ route('soporte.usuarios.eliminar', $usuario->id) }}" method="POST" style="display:inline;">
@csrf
<button type="submit" class="btn eliminar" onclick="return confirm('¿Eliminar este usuario?')">
Eliminar
</button>
</form>
</td>
</tr>

@endforeach

</table>

</div>

</body>
</html>