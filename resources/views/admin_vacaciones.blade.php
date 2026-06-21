<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Vacaciones Admin | EXPO</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

body{
background:#eef3f8;
padding:40px;
}

.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

h1{
color:#1e3a8a;
font-size:38px;
}

.btn-back{
background:#2563eb;
color:white;
padding:14px 22px;
border-radius:12px;
text-decoration:none;
font-weight:bold;
}

.stats{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
margin-bottom:25px;
}

.stat{
background:white;
padding:25px;
border-radius:22px;
box-shadow:0 8px 20px rgba(0,0,0,.06);
}

.stat h2{
font-size:34px;
color:#2563eb;
}

.card{
background:white;
padding:30px;
border-radius:25px;
box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.search{
width:100%;
padding:15px;
border-radius:12px;
border:1px solid #cbd5e1;
margin-bottom:20px;
font-size:16px;
}

table{
width:100%;
border-collapse:collapse;
}

thead{
background:#1e3a8a;
color:white;
}

th,td{
padding:18px;
text-align:left;
border-bottom:1px solid #e5e7eb;
}

.estado{
padding:8px 16px;
border-radius:20px;
font-weight:bold;
display:inline-block;
}

.aprobado{
background:#dcfce7;
color:#166534;
}

.pendiente{
background:#fef3c7;
color:#92400e;
}

.rechazado{
background:#fee2e2;
color:#991b1b;
}

select,input{
padding:11px;
border-radius:10px;
border:1px solid #cbd5e1;
}

.comentario{
width:180px;
}

.btn{
background:#2563eb;
color:white;
border:none;
padding:12px 16px;
border-radius:10px;
font-weight:bold;
cursor:pointer;
}

.btn:hover{
background:#1d4ed8;
}

.acciones{
display:flex;
gap:8px;
align-items:center;
}
</style>
</head>

<body>

<div class="header">
<div>
<h1>Solicitudes de Vacaciones</h1>
<p>Gestión y aprobación de solicitudes del personal</p>
</div>

<a href="{{ route('panel') }}" class="btn-back">← Regresar al panel</a>
</div>

<div class="stats">
<div class="stat">
<p>Pendientes</p>
<h2>{{ $solicitudes->where('estado','Pendiente')->count() }}</h2>
</div>

<div class="stat">
<p>Aprobadas</p>
<h2>{{ $solicitudes->where('estado','Aprobado')->count() }}</h2>
</div>

<div class="stat">
<p>Rechazadas</p>
<h2>{{ $solicitudes->where('estado','Rechazado')->count() }}</h2>
</div>
</div>

<div class="card">

<input type="text" class="search" id="buscar" placeholder="Buscar por empleado, fecha o motivo...">

<table id="tabla">
<thead>
<tr>
<th>Empleado</th>
<th>Inicio</th>
<th>Fin</th>
<th>Motivo</th>
<th>Estado</th>
<th>Comentario</th>
<th>Acción</th>
</tr>
</thead>

<tbody>
@foreach($solicitudes as $solicitud)
<tr>
<td>{{ $solicitud->empleado }}</td>
<td>{{ $solicitud->fecha_inicio }}</td>
<td>{{ $solicitud->fecha_fin }}</td>
<td>{{ $solicitud->motivo }}</td>

<td>
<span class="estado 
{{ strtolower($solicitud->estado) }}">
{{ $solicitud->estado }}
</span>
</td>

<td>
{{ $solicitud->comentario_admin ?? 'Sin comentario' }}
</td>

<td>
<form action="{{ route('admin.vacaciones.estado',$solicitud->id) }}" method="POST" class="acciones">
@csrf

<select name="estado">
<option value="Pendiente" {{ $solicitud->estado=='Pendiente' ? 'selected':'' }}>Pendiente</option>
<option value="Aprobado" {{ $solicitud->estado=='Aprobado' ? 'selected':'' }}>Aprobado</option>
<option value="Rechazado" {{ $solicitud->estado=='Rechazado' ? 'selected':'' }}>Rechazado</option>
</select>

<input 
type="text" 
name="comentario_admin" 
class="comentario"
placeholder="Comentario"
value="{{ $solicitud->comentario_admin ?? '' }}">

<button class="btn" type="submit">Guardar</button>

</form>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>

<script>
document.getElementById("buscar").addEventListener("keyup", function(){
let filtro = this.value.toLowerCase();
let filas = document.querySelectorAll("#tabla tbody tr");

filas.forEach(function(fila){
let texto = fila.textContent.toLowerCase();
fila.style.display = texto.includes(filtro) ? "" : "none";
});
});
</script>

</body>
</html>