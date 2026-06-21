<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Permiso</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
        body{background:#f1f5f9;color:#0f172a;padding:30px;}
        .card{max-width:650px;margin:auto;background:white;padding:35px;border-radius:22px;box-shadow:0 10px 25px rgba(0,0,0,.08);}
        h1{color:#1e3a8a;margin-bottom:10px;}
        p{color:#64748b;margin-bottom:25px;}
        label{font-weight:600;margin-bottom:8px;display:block;}
        input,textarea{width:100%;padding:13px;border:1px solid #cbd5e1;border-radius:12px;margin-bottom:18px;}
        textarea{height:120px;resize:none;}
        button{background:#2563eb;color:white;border:none;padding:13px 20px;border-radius:12px;font-weight:bold;cursor:pointer;}
        button:hover{background:#1d4ed8;}
        .volver{display:inline-block;margin-left:10px;color:#2563eb;text-decoration:none;font-weight:600;}
    </style>
</head>
<body>

<div class="card">
    <h1>Solicitar Permiso</h1>
    <p>Completa el formulario para enviar tu solicitud al administrador.</p>

    <form action="{{ route('permisos.guardar') }}" method="POST">
        @csrf

        <label>Fecha del permiso</label>
        <input type="date" name="fecha" required>

        <label>Motivo</label>
        <textarea name="motivo" placeholder="Escribe el motivo del permiso..." required></textarea>

        <button type="submit">Enviar solicitud</button>
        <a href="{{ route('menu.empleado') }}" class="volver">Volver al menú</a>
    </form>
</div>

</body>
</html>