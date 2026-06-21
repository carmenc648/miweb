<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo empleado | EXPO</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

        body{
            background:#f1f5f9;
            min-height:100vh;
        }

        .header{
            background:linear-gradient(135deg,#1e3a8a,#2563eb,#0ea5e9);
            color:white;
            padding:35px 55px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .header h1{
            font-size:36px;
        }

        .btn{
            padding:13px 20px;
            border-radius:12px;
            text-decoration:none;
            border:none;
            font-weight:700;
            cursor:pointer;
        }

        .btn-light{
            background:white;
            color:#2563eb;
        }

        .container{
            display:flex;
            justify-content:center;
            padding:50px;
        }

        .card{
            background:white;
            width:520px;
            padding:35px;
            border-radius:24px;
            box-shadow:0 12px 30px rgba(15,23,42,.12);
        }

        .card h2{
            color:#1e3a8a;
            margin-bottom:8px;
            font-size:30px;
        }

        .card p{
            color:#64748b;
            margin-bottom:28px;
        }

        label{
            font-weight:700;
            color:#334155;
        }

        input, select{
            width:100%;
            padding:14px;
            margin:8px 0 20px;
            border:1px solid #cbd5e1;
            border-radius:14px;
            font-size:15px;
            outline:none;
        }

        input:focus, select:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 3px rgba(37,99,235,.15);
        }

        .btn-save{
            width:100%;
            background:linear-gradient(135deg,#2563eb,#0ea5e9);
            color:white;
            font-size:16px;
            margin-top:10px;
        }

        .btn-save:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 22px rgba(37,99,235,.30);
        }
    </style>
</head>

<body>

<div class="header">
    <div>
        <h1>Registrar nuevo empleado</h1>
        <p>Agrega un nuevo colaborador al sistema</p>
    </div>

    <a href="{{ url('/empleados') }}" class="btn btn-light">← Regresar</a>
</div>

<div class="container">
    <div class="card">
        <h2>Datos del empleado</h2>
        <p>Completa la información solicitada.</p>

        <form method="POST" action="{{ url('/empleados/guardar') }}">
            @csrf

            <label>Nombre completo</label>
            <input type="text" name="nombre" placeholder="Ejemplo: Carmen Cruz" required>

            <label>Puesto</label>
            <input type="text" name="puesto" placeholder="Ejemplo: Administradora" required>

            <button type="submit" class="btn btn-save">Guardar empleado</button>
        </form>
    </div>
</div>

</body>
</html>