<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Vacaciones | EXPO</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

        body{
            background:#f1f5f9;
            color:#0f172a;
        }

        .header{
            background:linear-gradient(135deg,#1e3a8a,#2563eb,#0ea5e9);
            color:white;
            padding:35px 55px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .header h1{font-size:34px;}
        .header p{margin-top:6px;color:#dbeafe;}

        .btn{
            padding:13px 20px;
            border-radius:12px;
            border:none;
            text-decoration:none;
            font-weight:700;
            cursor:pointer;
            transition:.3s;
        }

        .btn-light{background:white;color:#2563eb;}
        .btn-green{background:#22c55e;color:white;}
        .btn-red{background:#ef4444;color:white;}

        .btn:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 22px rgba(0,0,0,.18);
        }

        .container{
            max-width:850px;
            margin:45px auto;
            padding:0 25px;
        }

        .card{
            background:white;
            border-radius:22px;
            padding:35px;
            box-shadow:0 12px 30px rgba(15,23,42,.10);
        }

        .card h2{
            margin-bottom:8px;
            color:#1e3a8a;
        }

        .card p{
            color:#64748b;
            margin-bottom:25px;
        }

        label{
            display:block;
            font-weight:700;
            margin-bottom:8px;
            color:#334155;
        }

        input, textarea{
            width:100%;
            padding:14px;
            border:1px solid #cbd5e1;
            border-radius:12px;
            margin-bottom:20px;
            font-size:15px;
            outline:none;
        }

        input:focus, textarea:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 3px #dbeafe;
        }

        textarea{
            height:120px;
            resize:none;
        }

        .actions{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:15px;
            margin-top:10px;
        }
    </style>
</head>

<body>

<div class="header">
    <div>
        <h1>Solicitar Vacaciones</h1>
        <p>Empleado: {{ auth()->user()->name }}</p>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-red" type="submit">Cerrar sesión</button>
    </form>
</div>

<div class="container">

    <div class="card">
        <h2>Nueva solicitud</h2>
        <p>Completa la información para enviar tu solicitud al administrador.</p>

        <form method="POST" action="{{ route('vacaciones.guardar') }}">
            @csrf

            <label>Fecha de inicio</label>
            <input type="date" name="fecha_inicio" required>

            <label>Fecha de fin</label>
            <input type="date" name="fecha_fin" required>

            <label>Motivo</label>
            <textarea name="motivo" placeholder="Escribe el motivo de tu solicitud..."></textarea>

            <div class="actions">
                <a href="{{ route('menu.empleado') }}" class="btn btn-light">← Volver al menú</a>

                <button type="submit" class="btn btn-green">
                    Enviar solicitud
                </button>
            </div>
        </form>
    </div>

</div>

</body>
</html>