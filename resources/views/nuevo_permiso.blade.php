<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Permiso</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family: Arial, sans-serif;
            background:#f4f7fb;
            color:#1f2937;
        }

        .container{
            max-width:800px;
            margin:40px auto;
            padding:20px;
        }

        .card{
            background:white;
            border-radius:18px;
            padding:30px;
            box-shadow:0 6px 16px rgba(0,0,0,0.08);
        }

        h1{
            color:#2563eb;
            margin-bottom:25px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
            margin-top:15px;
        }

        input, select, textarea{
            width:100%;
            padding:12px;
            border:1px solid #d1d5db;
            border-radius:10px;
            font-size:15px;
        }

        textarea{
            resize:vertical;
            min-height:100px;
        }

        .buttons{
            margin-top:25px;
            display:flex;
            gap:12px;
        }

        .btn{
            padding:12px 18px;
            border:none;
            border-radius:10px;
            font-weight:bold;
            cursor:pointer;
            text-decoration:none;
            display:inline-block;
        }

        .guardar{
            background:#2563eb;
            color:white;
        }

        .cancelar{
            background:#e5e7eb;
            color:#111827;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h1>Registrar nuevo permiso</h1>

            <form action="{{ url('/guardar-permiso') }}" method="POST">
                @csrf

                <label for="empleado">Empleado</label>
                <input type="text" name="empleado" id="empleado" required>

                <label for="motivo">Motivo</label>
                <textarea name="motivo" id="motivo" required></textarea>

                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" required>

                <label for="estado">Estado</label>
                <select name="estado" id="estado" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="aprobado">Aprobado</option>
                    <option value="rechazado">Rechazado</option>
                </select>

                <div class="buttons">
                    <button type="submit" class="btn guardar">Guardar permiso</button>
                    <a href="{{ url('/permisos') }}" class="btn cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>