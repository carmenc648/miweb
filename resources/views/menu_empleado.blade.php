<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Empleado | EXPO</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

        body{
            background:#f4f7fb;
            min-height:100vh;
            display:flex;
        }

        .sidebar{
            width:280px;
            background:linear-gradient(180deg,#0f172a,#1e3a8a);
            color:white;
            min-height:100vh;
            padding:25px 18px;
            position:fixed;
            left:0;
            top:0;
        }

        .logo{display:flex;align-items:center;gap:12px;margin-bottom:35px;}
        .logo-icon{
            width:55px;height:55px;background:#2563eb;border-radius:15px;
            display:flex;align-items:center;justify-content:center;font-size:28px;
        }
        .logo h2{font-size:28px;}
        .logo p{font-size:13px;color:#cbd5e1;}

        .menu a{
            display:flex;align-items:center;gap:12px;color:#e5e7eb;
            text-decoration:none;padding:14px 16px;border-radius:14px;
            margin-bottom:10px;transition:.3s;font-weight:600;
        }

        .menu a:hover,.menu a.active{
            background:#2563eb;
            transform:translateX(5px);
        }

        .help-box{
            margin-top:35px;background:rgba(255,255,255,.10);
            padding:20px;border-radius:20px;
            border:1px solid rgba(255,255,255,.10);
        }

        .help-box h4{margin-bottom:10px;}
        .help-box p{font-size:13px;color:#dbeafe;margin-bottom:15px;line-height:1.5;}
        .help-box button{
            width:100%;border:none;background:#3b82f6;color:white;
            padding:12px;border-radius:12px;cursor:pointer;font-weight:bold;
        }

        .main{
            margin-left:280px;
            width:calc(100% - 280px);
            padding:30px;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
        }

        .topbar h1{font-size:38px;color:#0f172a;}
        .topbar p{color:#64748b;margin-top:5px;}

        .user-box{
            background:white;
            padding:14px 18px;
            border-radius:20px;
            display:flex;
            align-items:center;
            gap:15px;
            box-shadow:0 10px 25px rgba(15,23,42,.08);
        }

        .avatar{
            width:50px;height:50px;border-radius:50%;
            background:linear-gradient(135deg,#2563eb,#7c3aed);
            display:flex;align-items:center;justify-content:center;
            color:white;font-size:22px;font-weight:bold;
        }

        .logout{
            border:none;background:#ef4444;color:white;
            padding:11px 18px;border-radius:12px;
            font-weight:bold;cursor:pointer;
        }

        .stats{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:20px;
            margin-bottom:30px;
        }

        .stat-card{
            background:white;
            padding:25px;
            border-radius:22px;
            box-shadow:0 12px 30px rgba(15,23,42,.08);
        }

        .stat-card h2{font-size:34px;color:#2563eb;}
        .stat-card p{color:#64748b;margin-top:8px;font-weight:600;}

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
            gap:22px;
            margin-bottom:30px;
        }

        .card{
            background:white;
            padding:28px;
            border-radius:24px;
            box-shadow:0 12px 30px rgba(15,23,42,.08);
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-8px);
            box-shadow:0 18px 40px rgba(15,23,42,.14);
        }

        .icon{
            width:70px;height:70px;border-radius:20px;
            display:flex;align-items:center;justify-content:center;
            font-size:35px;margin-bottom:20px;
        }

        .blue{background:#dbeafe;}
        .green{background:#dcfce7;}
        .orange{background:#ffedd5;}
        .purple{background:#ede9fe;}

        .card h2{color:#0f172a;margin-bottom:12px;}
        .card p{color:#64748b;line-height:1.6;margin-bottom:25px;}

        .card a{
            display:block;
            text-align:center;
            text-decoration:none;
            color:white;
            padding:13px;
            border-radius:14px;
            font-weight:bold;
        }

        .btn-blue{background:#2563eb;}
        .btn-green{background:#16a34a;}
        .btn-orange{background:#f97316;}
        .btn-purple{background:#7c3aed;}

        .bottom{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:22px;
        }

        .panel{
            background:white;
            border-radius:24px;
            padding:25px;
            box-shadow:0 12px 30px rgba(15,23,42,.08);
        }

        .panel h2{margin-bottom:18px;color:#0f172a;}

        .item{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:14px;
            border-radius:14px;
            background:#f8fafc;
            margin-bottom:12px;
        }

        .item strong{color:#0f172a;}
        .item span{font-size:13px;color:#64748b;}

        .badge{
            padding:7px 12px;
            border-radius:20px;
            font-size:13px;
            font-weight:bold;
        }

        .aprobada{background:#dcfce7;color:#15803d;}
        .pendiente{background:#ffedd5;color:#c2410c;}
        .rechazada{background:#fee2e2;color:#b91c1c;}

        @media(max-width:1100px){
            .stats{grid-template-columns:repeat(2,1fr);}
            .bottom{grid-template-columns:1fr;}
        }

        @media(max-width:800px){
            .sidebar{display:none;}
            .main{width:100%;margin-left:0;}
            .stats,.cards{grid-template-columns:1fr;}
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="logo">
        <div class="logo-icon">💼</div>
        <div>
            <h2>EXPO</h2>
            <p>Sistema de Vacaciones</p>
        </div>
    </div>

    <nav class="menu">
        <a href="{{ route('menu.empleado') }}" class="active">🏠 Inicio</a>
        <a href="{{ route('perfil') }}">👤 Mi Perfil</a>
        <a href="{{ route('vacaciones') }}">🏖️ Solicitar Vacaciones</a>
        <a href="{{ route('mis.solicitudes') }}">📋 Mis Vacaciones</a>
        <a href="{{ route('empleado.permisos') }}">📝 Solicitar Permiso</a>
        <a href="{{ route('mis.permisos') }}">📄 Mis Permisos</a>
    </nav>

    <div class="help-box">
        <h4>¿Necesitas ayuda?</h4>
        <p>Comunícate con Recursos Humanos para resolver tus dudas.</p>
        <button>Contactar soporte</button>
    </div>

</aside>

<main class="main">

    <section class="topbar">
        <div>
            <h1>
                Bienvenido nuevamente,
                {{ Auth::user()->name ?? 'Empleado' }} 👋
            </h1>
            <p>Gestiona tus vacaciones y permisos desde un solo lugar.</p>
        </div>

        <div class="user-box">
            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'E',0,1)) }}
            </div>

            <div>
                <strong>{{ Auth::user()->name ?? 'Empleado' }}</strong>
                <p>Empleado</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout">Cerrar sesión</button>
            </form>
        </div>
    </section>

    <section class="stats">
        <div class="stat-card">
            <h2>2</h2>
            <p>Solicitudes pendientes</p>
        </div>

        <div class="stat-card">
            <h2>5</h2>
            <p>Vacaciones aprobadas</p>
        </div>

        <div class="stat-card">
            <h2>1</h2>
            <p>Permisos pendientes</p>
        </div>

        <div class="stat-card">
            <h2>18</h2>
            <p>Días disponibles</p>
        </div>
    </section>

    <section class="cards">

        <div class="card">
            <div class="icon blue">👤</div>
            <h2>Mi Perfil</h2>
            <p>Consulta y revisa tus datos personales registrados en el sistema.</p>
            <a href="{{ route('perfil') }}" class="btn-blue">Ver perfil</a>
        </div>

        <div class="card">
            <div class="icon green">🏖️</div>
            <h2>Solicitar Vacaciones</h2>
            <p>Envía una nueva solicitud de vacaciones al área administrativa.</p>
            <a href="{{ route('vacaciones') }}" class="btn-green">Nueva solicitud</a>
        </div>

        <div class="card">
            <div class="icon orange">📋</div>
            <h2>Mis Vacaciones</h2>
            <p>Revisa si tus solicitudes fueron aprobadas, rechazadas o siguen pendientes.</p>
            <a href="{{ route('mis.solicitudes') }}" class="btn-orange">Ver solicitudes</a>
        </div>

        <div class="card">
            <div class="icon purple">📝</div>
            <h2>Solicitar Permiso</h2>
            <p>Realiza solicitudes de permisos laborales de forma rápida.</p>
            <a href="{{ route('empleado.permisos') }}" class="btn-purple">Nuevo permiso</a>
        </div>

        <div class="card">
            <div class="icon purple">📄</div>
            <h2>Mis Permisos</h2>
            <p>Consulta tus permisos enviados y revisa si fueron aprobados, rechazados o siguen pendientes.</p>
            <a href="{{ route('mis.permisos') }}" class="btn-purple">Ver permisos</a>
        </div>

    </section>

    <section class="bottom">

        <div class="panel">
            <h2>Próximas vacaciones</h2>

            <div class="item">
                <div>
                    <strong>Vacaciones de verano</strong><br>
                    <span>15 al 22 de julio</span>
                </div>
                <span class="badge aprobada">Aprobada</span>
            </div>

            <div class="item">
                <div>
                    <strong>Solicitud de descanso</strong><br>
                    <span>Pendiente de revisión</span>
                </div>
                <span class="badge pendiente">Pendiente</span>
            </div>
        </div>

        <div class="panel">
            <h2>Solicitudes recientes</h2>

            <div class="item">
                <div>
                    <strong>Permiso personal</strong><br>
                    <span>14 de mayo</span>
                </div>
                <span class="badge pendiente">Pendiente</span>
            </div>

            <div class="item">
                <div>
                    <strong>Vacaciones Semana Santa</strong><br>
                    <span>25 al 29 de marzo</span>
                </div>
                <span class="badge aprobada">Aprobada</span>
            </div>

            <div class="item">
                <div>
                    <strong>Permiso médico</strong><br>
                    <span>5 de marzo</span>
                </div>
                <span class="badge rechazada">Rechazada</span>
            </div>
        </div>

    </section>

</main>

</body>
</html>