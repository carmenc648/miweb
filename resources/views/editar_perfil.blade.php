<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil | EXPO</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f4f7fb;
            min-height:100vh;
        }

        .container{
            max-width:700px;
            margin:60px auto;
            padding:20px;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:25px;
            box-shadow:0 15px 40px rgba(15,23,42,.10);
        }

        h1{
            margin-bottom:30px;
            color:#0f172a;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
            color:#334155;
        }

        input{
            width:100%;
            padding:14px;
            border:1px solid #dbeafe;
            border-radius:12px;
            font-size:16px;
        }

        .buttons{
            display:flex;
            justify-content:space-between;
            margin-top:30px;
        }

        .btn{
            text-decoration:none;
            border:none;
            padding:14px 22px;
            border-radius:12px;
            color:white;
            font-weight:bold;
            cursor:pointer;
        }

        .blue{
            background:#2563eb;
        }

        .green{
            background:#16a34a;
        }

    </style>

</head>
<body>

    <div class="container">

        <div class="card">

            <h1>Editar Perfil</h1>

            <form>

                <div class="form-group">
                    <label>Nombre</label>

                    <input type="text"
                    value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <label>Correo</label>

                    <input type="email"
                    value="{{ Auth::user()->email }}">
                </div>

                <div class="buttons">

                    <a href="{{ url('/perfil') }}"
                    class="btn blue">
                        ← Volver
                    </a>

                    <button class="btn green">
                        Guardar Cambios
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>