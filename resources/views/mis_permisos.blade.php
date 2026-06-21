<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Permisos | EXPO</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

        body{
            background:#eef3fb;
            padding:40px;
        }

        .card{
            background:white;
            border-radius:22px;
            padding:30px;
            box-shadow:0 12px 30px rgba(15,23,42,.10);
            max-width:1100px;
            margin:auto;
        }

        h1{
            color:#1e3a8a;
            margin-bottom:8px;
            font-size:34px;
        }

        p{
            color:#64748b;
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            overflow:hidden;
            border-radius:16px;
        }

        th{
            background:#1e3a8a;
            color:white;
            padding:15px;
            text-align:left;
        }

        td{
            padding:15px;
            border-bottom:1px solid #e2e8f0;
        }

        tr:hover{
            background:#f8fafc;
        }

        .estado{
            padding:8px 14px;
            border-radius:20px;
            font-weight:bold;
            font-size:13px;
        }

        .Pendiente{
            background:#fef3c7;
            color:#92400e;
        }

        .Aprobado{
            background:#dcfce7;
            color:#166534;
        }

        .Rechazado{
            background:#fee2e2;
            color:#991b1b;
        }

        .empty{
            text-align:center;
            color:#64748b;
            padding:25px;
        }

        .btn{
            display:inline-block;
            margin-top:25px;
            padding:13px 20px;
            background:#2563eb;
            color:white;
            text-decoration:none;
            border-radius:12px;
            font-weight:bold;
        }

        .btn:hover{
            background:#1d4ed8;
        }
    </style>
</head>

<body>

<div class="card">

    <h1>📄 Mis permisos</h1>
    <p>Consulta el estado de tus permisos solicitados.</p>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Comentario del admin</th>
            </tr>
        </thead>

        <tbody>
            @forelse($permisos as $permiso)
                <tr>
                    <td>{{ $permiso->fecha }}</td>
                    <td>{{ $permiso->motivo }}</td>
                    <td>
                        <span class="estado {{ $permiso->estado }}">
                            {{ $permiso->estado }}
                        </span>
                    </td>
                    <td>{{ $permiso->comentario_admin ?? 'Sin comentario' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">
                        No has solicitado permisos aún.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('menu.empleado') }}" class="btn">
        ← Volver al menú
    </a>

</div>

</body>
</html>