<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reportes | EXPO</title>

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
margin-bottom:30px;
}

h1{
color:#1e3a8a;
font-size:38px;
}

.btn{
background:#2563eb;
color:white;
padding:14px 22px;
border-radius:12px;
text-decoration:none;
font-weight:bold;
border:none;
cursor:pointer;
}

.stats{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
margin-bottom:25px;
}

.card{
background:white;
padding:25px;
border-radius:22px;
box-shadow:0 8px 20px rgba(0,0,0,.06);
}

.card h2{
font-size:35px;
color:#2563eb;
margin-top:10px;
}

.section{
background:white;
padding:30px;
border-radius:25px;
box-shadow:0 8px 25px rgba(0,0,0,.08);
margin-top:25px;
}

table{
width:100%;
border-collapse:collapse;
margin-top:15px;
}

th{
background:#1e3a8a;
color:white;
padding:15px;
text-align:left;
}

td{
padding:15px;
border-bottom:1px solid #e5e7eb;
}

@media print{
.btn{
display:none;
}
}
</style>
</head>

<body>

<div class="header">
<div>
<h1>Reportes del Sistema</h1>
<p>Resumen general de Recursos Humanos</p>
</div>

<div>
<a href="{{ route('panel') }}" class="btn">← Regresar</a>
<button onclick="window.print()" class="btn">🖨 Imprimir / PDF</button>
</div>
</div>

<div class="stats">
<div class="card">
<p>Total de empleados</p>
<h2>{{ $totalEmpleados }}</h2>
</div>

<div class="card">
<p>Vacaciones pendientes</p>
<h2>{{ $vacacionesPendientes }}</h2>
</div>

<div class="card">
<p>Permisos pendientes</p>
<h2>{{ $permisosPendientes }}</h2>
</div>
</div>

<div class="section">
<h2>Reporte de vacaciones</h2>

<table>
<tr>
<th>Estado</th>
<th>Total</th>
</tr>

<tr>
<td>Pendientes</td>
<td>{{ $vacacionesPendientes }}</td>
</tr>

<tr>
<td>Aprobadas</td>
<td>{{ $vacacionesAprobadas }}</td>
</tr>

<tr>
<td>Rechazadas</td>
<td>{{ $vacacionesRechazadas }}</td>
</tr>
</table>
</div>

<div class="section">
<h2>Reporte de permisos</h2>

<table>
<tr>
<th>Estado</th>
<th>Total</th>
</tr>

<tr>
<td>Pendientes</td>
<td>{{ $permisosPendientes }}</td>
</tr>

<tr>
<td>Aprobados</td>
<td>{{ $permisosAprobados }}</td>
</tr>

<tr>
<td>Rechazados</td>
<td>{{ $permisosRechazados }}</td>
</tr>
</table>
</div>

</body>
</html>