<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Admin | EXPO</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Segoe UI;}
body{background:#eef3f8;display:flex;}

.sidebar{
width:280px;height:100vh;
background:linear-gradient(180deg,#07173d,#1f3b88);
padding:40px 25px;position:fixed;left:0;top:0;
}

.logo{color:white;font-size:55px;font-weight:bold;margin-bottom:10px;}
.sub{color:#dbeafe;margin-bottom:50px;}

.menu a{
display:block;padding:18px;margin-bottom:12px;text-decoration:none;
color:white;border-radius:14px;transition:.3s;font-size:18px;
}

.menu a:hover{background:rgba(255,255,255,.15);}

.main{margin-left:280px;padding:35px;width:100%;}

.top{
background:white;padding:30px;border-radius:30px;display:flex;
justify-content:space-between;align-items:center;margin-bottom:30px;
}

.user{
background:#dbeafe;padding:20px;border-radius:20px;
font-weight:bold;color:#1d4ed8;
}

.stats{
display:grid;grid-template-columns:repeat(4,1fr);
gap:20px;margin-bottom:30px;
}

.card{
background:white;padding:25px;border-radius:25px;
box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.card h2{font-size:35px;color:#2563eb;margin-top:10px;}

.welcome{
background:linear-gradient(90deg,#2563eb,#0ea5e9);
padding:35px;color:white;border-radius:30px;margin-bottom:30px;
}

.grid{display:grid;grid-template-columns:2fr 1fr;gap:25px;}
.box{background:white;padding:30px;border-radius:25px;}

.quick{
padding:18px;background:#f3f6fb;border-left:6px solid #2563eb;
border-radius:15px;margin-top:15px;
}

.quick a{text-decoration:none;color:#1e3a8a;font-weight:bold;}

.notify{
padding:15px;background:#f8fafc;margin-top:15px;border-radius:12px;
}
</style>
</head>

<body>

<div class="sidebar">
    <div class="logo">EXPO</div>
    <div class="sub">Sistema Recursos Humanos</div>

    <div class="menu">
        <a href="{{ route('panel') }}">🏠 Dashboard</a>
        <a href="{{ route('empleados') }}">👥 Empleados</a>
        <a href="{{ route('admin.vacaciones') }}">🌴 Vacaciones</a>
        <a href="{{ route('admin.permisos') }}">📝 Permisos</a>
        <a href="{{ route('reportes') }}">📊 Reportes</a>
        

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button style="margin-top:20px;width:100%;padding:16px;border:none;border-radius:15px;background:#ef4444;color:white;font-size:16px;cursor:pointer;">
                Cerrar sesión
            </button>
        </form>
    </div>
</div>

<div class="main">

    <div class="top">
        <div>
            <h1>Panel de Control</h1>
            <p>Resumen general del sistema</p>
        </div>

        <div class="user">
            👤 {{ auth()->user()->name }} <br>
            Administrador
        </div>
    </div>

    <div class="stats">
        <div class="card">
            Empleados
            <h2>{{ $totalEmpleados }}</h2>
        </div>

        <div class="card">
            Vacaciones
            <h2>{{ $totalVacaciones }}</h2>
        </div>

        <div class="card">
            Permisos
            <h2>{{ $totalPermisos }}</h2>
        </div>

        <div class="card">
            Aprobadas
            <h2>{{ $totalAprobadas }}</h2>
        </div>
    </div>

    <div class="welcome">
        <h1>Bienvenida {{ auth()->user()->name }} 👋</h1>
        <br>
        Hoy tienes:
        <br><br>
        • {{ $totalVacaciones }} solicitudes de vacaciones registradas
        <br>
        • {{ $totalPermisos }} permisos registrados
        <br>
        • {{ $totalEmpleados }} empleados en el sistema
    </div>

    <div class="grid">
        <div class="box">
            <h2>Últimas notificaciones</h2>
            <div class="notify">Sistema actualizado correctamente</div>
            <div class="notify">Total de empleados: {{ $totalEmpleados }}</div>
            <div class="notify">Permisos registrados: {{ $totalPermisos }}</div>
            <div class="notify">Vacaciones registradas: {{ $totalVacaciones }}</div>
        </div>

        <div class="box">
            <h2>Accesos rápidos</h2>

            <div class="quick">
                <a href="{{ route('empleados.nuevo') }}">👤 Registrar empleado</a>
            </div>

            <div class="quick">
                <a href="{{ route('admin.vacaciones') }}">🌴 Gestionar vacaciones</a>
            </div>

            <div class="quick">
                <a href="{{ route('admin.permisos') }}">📝 Gestionar permisos</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>