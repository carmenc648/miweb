<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar empleado</title>

<style>
body{
    background:#eef3f8;
    font-family:'Segoe UI',sans-serif;
    padding:40px;
}

.card{
    background:white;
    max-width:520px;
    margin:auto;
    padding:35px;
    border-radius:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

h1{
    color:#1e3a8a;
    margin-bottom:25px;
}

label{
    font-weight:bold;
}

input,select{
    width:100%;
    padding:14px;
    margin:10px 0 20px;
    border:1px solid #cbd5e1;
    border-radius:12px;
}

button{
    width:100%;
    background:#2563eb;
    color:white;
    border:none;
    padding:15px;
    border-radius:12px;
    font-weight:bold;
    cursor:pointer;
}

a{
    display:block;
    margin-top:15px;
    text-align:center;
    color:#2563eb;
    text-decoration:none;
}
</style>
</head>

<body>

<div class="card">
<h1>Editar empleado</h1>

<form method="POST" action="{{ route('empleados.actualizar', $empleado->id) }}">
@csrf

<label>Nombre</label>
<input type="text" name="nombre" value="{{ $empleado->nombre }}" required>

<label>Puesto</label>
<input type="text" name="puesto" value="{{ $empleado->puesto }}" required>

<label>Estado</label>
<select name="estado">
    <option value="Activo" {{ $empleado->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
    <option value="Inactivo" {{ $empleado->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
</select>

<button type="submit">Guardar cambios</button>
</form>

<a href="{{ route('empleados') }}">← Regresar</a>
</div>

</body>
</html>