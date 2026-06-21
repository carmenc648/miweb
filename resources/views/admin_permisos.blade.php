<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Permisos Admin | EXPO</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

body{background:#eef3f8;padding:35px;}

.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
}

.back{
background:white;
padding:16px 24px;
border-radius:15px;
text-decoration:none;
font-weight:bold;
color:#2563eb;
box-shadow:0 8px 20px rgba(0,0,0,.08);
}

h1{font-size:40px;color:#1e3a8a;margin-top:20px;}

.sub{color:#64748b;margin-top:8px;font-size:18px;}

.stats{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
padding:25px;
border-radius:24px;
box-shadow:0 8px 25px rgba(0,0,0,.06);
}

.card p{color:#475569;font-weight:bold;}

.card h2{font-size:38px;color:#2563eb;margin-top:8px;}

.panel{
background:white;
padding:30px;
border-radius:25px;
box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.filtros{
display:flex;
gap:20px;
margin-bottom:25px;
}

.buscar{
flex:1;
padding:15px;
border:1px solid #cbd5e1;
border-radius:14px;
font-size:16px;
}

.filtros select{
padding:15px;
border:1px solid #cbd5e1;
border-radius:14px;
font-size:16px;
}

.exportar{
background:#2563eb;
color:white;
padding:15px 22px;
border-radius:14px;
text-decoration:none;
font-weight:bold;
}

table{width:100%;border-collapse:collapse;}

thead{background:#1e3a8a;color:white;}

th,td{
padding:18px;
text-align:left;
border-bottom:1px solid #e5e7eb;
font-size:16px;
}

tr:nth-child(even){background:#f8fafc;}

.estado{
padding:8px 16px;
border-radius:20px;
font-weight:bold;
display:inline-block;
}

.pendiente{background:#fef3c7;color:#92400e;}
.aprobado{background:#dcfce7;color:#166534;}
.rechazado{background:#fee2e2;color:#991b1b;}

.acciones{
display:flex;
gap:8px;
align-items:center;
}

.acciones select,
.acciones input{
padding:12px;
border:1px solid #cbd5e1;
border-radius:12px;
font-size:15px;
}

.btn{
background:#2563eb;
color:white;
border:none;
padding:13px 18px;
border-radius:12px;
font-weight:bold;
cursor:pointer;
}

.info{
margin-top:25px;
background:white;
padding:18px;
border-radius:18px;
color:#1e3a8a;
box-shadow:0 8px 25px rgba(0,0,0,.05);
}
</style>
</head>

<body>

<a href="{{ route('panel') }}" class="back">← Regresar al panel</a>

<h1>Solicitudes de permisos</h1>
<p class="sub">Panel administrativo para revisar, aprobar o rechazar permisos solicitados por empleados.</p>

<br>

<div class="stats">
<div class="card">
<p>Pendientes</p>
<h2>{{ $permisos->where('estado','Pendiente')->count() }}</h2>
</div>

<div class="card">
<p>Aprobados</p>
<h2>{{ $permisos->where('estado','Aprobado')->count() }}</h2>
</div>

<div class="card">
<p>Rechazados</p>
<h2>{{ $permisos->where('estado','Rechazado')->count() }}</h2>
</div>

<div class="card">
<p>Total solicitudes</p>
<h2>{{ $permisos->count() }}</h2>
</div>
</div>

<div class="panel">

<div class="filtros">
<input type="text" id="buscar" class="buscar" placeholder="Buscar por empleado o motivo...">

<select id="estadoFiltro">
<option value="">Todos los estados</option>
<option value="Pendiente">Pendiente</option>
<option value="Aprobado">Aprobado</option>
<option value="Rechazado">Rechazado</option>
</select>

<a href="#" class="exportar">Exportar</a>
</div>

<table id="tabla">
<thead>
<tr>
<th>Empleado</th>
<th>Fecha</th>
<th>Motivo</th>
<th>Estado</th>
<th>Comentario admin</th>
<th>Acción</th>
</tr>
</thead>

<tbody>
@foreach($permisos as $permiso)
<tr>
<td>{{ $permiso->empleado }}</td>
<td>{{ $permiso->fecha }}</td>
<td>{{ $permiso->motivo }}</td>

<td>
<span class="estado {{ strtolower($permiso->estado) }}">
{{ $permiso->estado }}
</span>
</td>

<td>{{ $permiso->comentario_admin ?? 'Sin comentario' }}</td>

<td>
<form action="{{ route('admin.permisos.estado',$permiso->id) }}" method="POST" class="acciones">
@csrf

<select name="estado">
<option value="Pendiente" {{ $permiso->estado=='Pendiente' ? 'selected':'' }}>Pendiente</option>
<option value="Aprobado" {{ $permiso->estado=='Aprobado' ? 'selected':'' }}>Aprobado</option>
<option value="Rechazado" {{ $permiso->estado=='Rechazado' ? 'selected':'' }}>Rechazado</option>
</select>

<input type="text" name="comentario_admin" placeholder="Comentario" value="{{ $permiso->comentario_admin }}">

<button class="btn" type="submit">Guardar</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>

<div class="info">
ℹ Información: selecciona un estado y agrega comentario antes de guardar.
</div>

<script>
const buscar = document.getElementById("buscar");
const estadoFiltro = document.getElementById("estadoFiltro");
const filas = document.querySelectorAll("#tabla tbody tr");

function filtrar(){
let texto = buscar.value.toLowerCase();
let estado = estadoFiltro.value.toLowerCase();

filas.forEach(fila => {
let contenido = fila.innerText.toLowerCase();
let cumpleTexto = contenido.includes(texto);
let cumpleEstado = estado === "" || contenido.includes(estado);
fila.style.display = cumpleTexto && cumpleEstado ? "" : "none";
});
}

buscar.addEventListener("keyup", filtrar);
estadoFiltro.addEventListener("change", filtrar);
</script>

</body>
</html>