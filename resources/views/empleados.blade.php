<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Empleados | EXPO</title>

<style>
*{ margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', sans-serif; }
body{ background:#f1f5f9; color:#0f172a; }
.header{ background:linear-gradient(135deg,#1e3a8a,#2563eb,#0ea5e9); color:white; padding:35px 55px; display:flex; justify-content:space-between; align-items:center; }
.header h1{ font-size:38px; }
.header p{ margin-top:6px; color:#dbeafe; }
.actions{ display:flex; gap:15px; }
.btn{ padding:13px 20px; border-radius:12px; border:none; text-decoration:none; font-weight:700; cursor:pointer; }
.btn-light{ background:white; color:#2563eb; }
.btn-red{ background:#ef4444; color:white; }
.btn-green{ background:#22c55e; color:white; }
.container{ padding:40px 55px; }
.top-tools{ display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; }
.search{ width:360px; padding:14px 18px; border:1px solid #cbd5e1; border-radius:14px; font-size:15px; }
.table-card{ background:white; border-radius:22px; overflow:hidden; box-shadow:0 12px 30px rgba(15,23,42,.10); }
table{ width:100%; border-collapse:collapse; }
th{ background:#1d4ed8; color:white; padding:18px; text-align:left; font-size:16px; }
td{ padding:18px; border-bottom:1px solid #e5e7eb; font-size:16px; }
tr:hover{ background:#f8fafc; }
.badge{ padding:7px 14px; border-radius:20px; font-weight:700; font-size:13px; }
.activo{ background:#dcfce7; color:#166534; }
.avatar{ width:42px; height:42px; border-radius:50%; background:#dbeafe; color:#1d4ed8; display:inline-flex; align-items:center; justify-content:center; font-weight:800; margin-right:12px; }
.name-cell{ display:flex; align-items:center; }
.small-btn{ padding:8px 12px; border-radius:10px; border:none; text-decoration:none; font-size:13px; font-weight:700; margin-right:6px; cursor:pointer; }
.edit{ background:#dbeafe; color:#1d4ed8; }
.delete{ background:#fee2e2; color:#991b1b; }
</style>
</head>

<body>

<div class="header">
    <div>
        <h1>Lista de empleados</h1>
        <p>Gestión del personal registrado en el sistema</p>
    </div>

    <div class="actions">
        <a href="{{ route('panel') }}" class="btn btn-light">← Regresar</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-red" type="submit">Cerrar sesión</button>
        </form>
    </div>
</div>

<div class="container">

    <div class="top-tools">
        <input class="search" type="text" placeholder="Buscar empleado...">
        <a href="{{ route('empleados.nuevo') }}" class="btn btn-green">+ Nuevo empleado</a>
    </div>

    <div class="table-card">
        <table>
            <tr>
                <th>Empleado</th>
                <th>Puesto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

            @foreach($empleados as $empleado)
            <tr>
                <td>
                    <div class="name-cell">
                        <span class="avatar">
                            {{ strtoupper(substr($empleado->nombre, 0, 2)) }}
                        </span>
                        <div>
                            <strong>{{ $empleado->nombre }}</strong><br>
                            <small>Empleado registrado</small>
                        </div>
                    </div>
                </td>

                <td>{{ $empleado->puesto }}</td>

                <td>
                    <span class="badge activo">{{ $empleado->estado }}</span>
                </td>

                <td>
                    <a href="{{ route('empleados.editar', $empleado->id) }}" class="small-btn edit">
                        Editar
                    </a>

                    <form action="{{ route('empleados.eliminar', $empleado->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="small-btn delete" onclick="return confirm('¿Deseas eliminar este empleado?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>

</body>
</html>