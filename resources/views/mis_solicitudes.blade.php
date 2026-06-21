<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Solicitudes | EXPO</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
        }

        body{
            min-height:100vh;
            background:#eef3fb;
            padding:45px;
        }

        .card{
            background:white;
            max-width:1200px;
            margin:auto;
            border-radius:24px;
            padding:35px;
            box-shadow:0 18px 40px rgba(15,23,42,.12);
        }

        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .header h1{
            font-size:38px;
            color:#0f172a;
        }

        .header p{
            margin-top:8px;
            color:#64748b;
            font-size:17px;
        }

        .contador{
            background:#dbeafe;
            color:#1d4ed8;
            padding:13px 22px;
            border-radius:14px;
            font-weight:bold;
        }

        table{
            width:100%;
            border-collapse:separate;
            border-spacing:0;
            overflow:hidden;
            border:1px solid #dbeafe;
            border-radius:18px;
        }

        thead{
            background:#eff6ff;
        }

        th{
            padding:18px;
            color:#1e40af;
            text-align:left;
            font-size:16px;
        }

        td{
            padding:18px;
            border-top:1px solid #e5e7eb;
            color:#0f172a;
            font-size:16px;
        }

        tbody tr:hover{
            background:#f8fafc;
        }

        .tipo{
            background:#e0ecff;
            color:#2563eb;
            padding:9px 15px;
            border-radius:30px;
            font-weight:bold;
            display:inline-block;
        }

        .estado{
            padding:9px 16px;
            border-radius:30px;
            font-weight:bold;
            display:inline-block;
        }

        .aprobado{
            background:#dcfce7;
            color:#15803d;
        }

        .pendiente{
            background:#fef3c7;
            color:#b45309;
        }

        .rechazado{
            background:#fee2e2;
            color:#b91c1c;
        }

        .btn{
            display:inline-block;
            margin-top:28px;
            padding:14px 22px;
            background:#2563eb;
            color:white;
            text-decoration:none;
            border-radius:12px;
            font-weight:bold;
            box-shadow:0 8px 18px rgba(37,99,235,.3);
        }

        .btn:hover{
            background:#1d4ed8;
        }

        .vacio{
            text-align:center;
            padding:35px;
            color:#64748b;
        }
    </style>
</head>

<body>

<div class="card">

    <div class="header">
        <div>
            <h1>📋 Mis Solicitudes</h1>
            <p>Consulta el estado de tus solicitudes realizadas.</p>
        </div>

        <div class="contador">
            Total: {{ count($solicitudes) }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Motivo</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>
            @forelse($solicitudes as $s)
                <tr>
                    <td>
                        <span class="tipo">
                            🏖️ {{ $s->tipo ?? 'Vacaciones' }}
                        </span>
                    </td>

                    <td>{{ $s->fecha_inicio }}</td>

                    <td>{{ $s->fecha_fin }}</td>

                    <td>
                        {{ $s->motivo ?: 'Sin motivo registrado' }}
                    </td>

                    <td>
                        @if($s->estado == 'Aprobado')
                            <span class="estado aprobado">✅ Aprobado</span>
                        @elseif($s->estado == 'Pendiente')
                            <span class="estado pendiente">⏳ Pendiente</span>
                        @else
                            <span class="estado rechazado">❌ Rechazado</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="vacio">
                        No tienes solicitudes registradas todavía.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

<a href="/menu-empleado" class="btn">← Volver al menú</a>
</div>

</body>
</html>