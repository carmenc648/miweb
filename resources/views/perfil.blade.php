<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil | EXPO</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}

        body{
            background:#f4f7fb;
            min-height:100vh;
        }

        .header{
            background:linear-gradient(135deg,#1e3a8a,#2563eb);
            color:white;
            padding:25px 50px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .header h1{
            font-size:30px;
        }

        .container{
            max-width:950px;
            margin:60px auto;
            padding:0 25px;
        }

        .card{
            background:white;
            border-radius:28px;
            padding:45px;
            box-shadow:0 15px 40px rgba(15,23,42,.12);
        }

        .profile-top{
            text-align:center;
            margin-bottom:35px;
        }

        .avatar{
            width:110px;
            height:110px;
            background:linear-gradient(135deg,#2563eb,#7c3aed);
            color:white;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:45px;
            margin:0 auto 18px;
        }

        .profile-top h2{
            font-size:36px;
            color:#0f172a;
        }

        .profile-top p{
            color:#64748b;
            margin-top:6px;
        }

        .info{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
            margin-bottom:35px;
        }

        .info-box{
            background:#f1f5f9;
            padding:18px 20px;
            border-radius:16px;
            font-size:18px;
        }

        .info-box strong{
            color:#0f172a;
        }

        .actions{
            display:flex;
            justify-content:space-between;
            gap:15px;
        }

        .btn{
            border:none;
            text-decoration:none;
            padding:14px 24px;
            border-radius:14px;
            font-weight:700;
            cursor:pointer;
            color:white;
            display:inline-block;
        }

        .btn-blue{
            background:#2563eb;
        }

        .btn-green{
            background:#16a34a;
        }

        @media(max-width:700px){
            .info{
                grid-template-columns:1fr;
            }

            .actions{
                flex-direction:column;
            }

            .btn{
                text-align:center;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Sistema de Vacaciones</h1>
    </div>

    <div class="container">

        <div class="card">

            <div class="profile-top">
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'E', 0, 1)) }}
                </div>

                <h2>{{ Auth::user()->name ?? 'Empleado' }}</h2>
                <p>{{ Auth::user()->rol ?? 'empleado' }}</p>
            </div>

            <div class="info">
                <div class="info-box">
                    📧 <strong>Correo:</strong>
                    {{ Auth::user()->email ?? 'empleado@gmail.com' }}
                </div>

                <div class="info-box">
                    👤 <strong>Rol:</strong>
                    {{ Auth::user()->rol ?? 'empleado' }}
                </div>
            </div>

            <div class="actions">
                <a href="{{ url('/menu-empleado') }}" class="btn btn-blue">
                    ← Volver
                </a>

                <a href="{{ url('/editar-perfil') }}" class="btn btn-green">
    Editar Perfil
</a>
            </div>

        </div>

    </div>

</body>
</html>