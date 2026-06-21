<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistema RRHH Vacaciones y Permisos</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1e3a8a, #0284c7);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 900px;
            min-height: 520px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0,0,0,.35);
            animation: entrada 0.8s ease;
        }




        @keyframes entrada {
    from {
        opacity: 0;
        transform: translateY(35px) scale(0.96);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.logo {
    animation: flotar 2.5s ease-in-out infinite;
}

@keyframes flotar {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-8px);
    }
}

        .left {
    padding: 50px;
    color: white;
    background:
        linear-gradient(rgba(255,255,255,.15), rgba(15,23,42,.45)),
        url('{{ asset("img/login.jpg") }}') center center / cover no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}
        .left h1 {
            font-size: 38px;
            margin: 0 0 12px;
        }

        .left p {
            font-size: 16px;
            line-height: 1.6;
            margin: 0;
        }

        .right {
            padding: 55px 45px;
        }

        .logo {
            width: 58px;
            height: 58px;
            background: #2563eb;
            color: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 25px;
            font-size: 22px;
        }

        h2 {
            margin: 0;
            color: #0f172a;
            font-size: 30px;
        }

        .subtitle {
            color: #64748b;
            margin: 8px 0 30px;
        }

        label {
            font-size: 14px;
            color: #334155;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 14px;
            margin: 8px 0 20px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.15);
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #2563eb, #0284c7);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37,99,235,.35);
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .footer {
            margin-top: 25px;
            font-size: 13px;
            color: #94a3b8;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-card">

    <div class="left">
        <h1> </h1>
        <p></p>
    </div>

    <div class="right">
        <div class="logo"></div>

        <h2>Bienvenido</h2>
        <p class="subtitle">Ingrese sus credenciales para continuar</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.procesar') }}">
            @csrf

            <label>Correo electrónico</label>
            <input type="email" name="email" placeholder="admin@gmail.com" required>

            <label>Contraseña</label>
            <input type="password" name="password" placeholder="Ingrese su contraseña" required>

            <button type="submit">Iniciar sesión</button>
        </form>

        <div class="footer">
            © 2026 Sistema Vacaciones
        </div>
    </div>

</div>

</body>
</html>