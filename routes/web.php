<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

/* ================= CREAR USUARIOS DE PRUEBA ================= */

Route::get('/crear-usuarios-prueba', function () {
    DB::table('users')->delete();

    DB::table('users')->insert([
        [
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'rol' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Empleado',
            'email' => 'empleado@gmail.com',
            'password' => Hash::make('12345678'),
            'rol' => 'empleado',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Programador',
            'email' => 'soporte@expo.com',
            'password' => Hash::make('12345678'),
            'rol' => 'programador',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);

    return 'Usuarios creados correctamente';
});

/* ================= LOGIN ================= */

Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.procesar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ================= RUTAS PROTEGIDAS ================= */

Route::middleware(['auth'])->group(function () {

    /* ================= ADMIN ================= */

    Route::get('/panel', function () {
        if (auth()->user()->rol !== 'admin') abort(403);

        $totalEmpleados = DB::table('empleados')->count();
        $totalVacaciones = DB::table('solicitudes_vacaciones')->count();
        $totalPermisos = DB::table('solicitudes_permisos')->count();

        $totalAprobadas =
            DB::table('solicitudes_vacaciones')->where('estado', 'Aprobado')->count()
            +
            DB::table('solicitudes_permisos')->where('estado', 'Aprobado')->count();

        return view('panel', compact(
            'totalEmpleados',
            'totalVacaciones',
            'totalPermisos',
            'totalAprobadas'
        ));
    })->name('panel');

    Route::get('/empleados', function () {
        if (auth()->user()->rol !== 'admin') abort(403);

        $empleados = DB::table('empleados')->get();

        return view('empleados', compact('empleados'));
    })->name('empleados');

    Route::get('/empleados/nuevo', function () {
        if (auth()->user()->rol !== 'admin') abort(403);

        return view('nuevo_empleado');
    })->name('empleados.nuevo');

    Route::post('/empleados/guardar', function (Request $request) {
        if (auth()->user()->rol !== 'admin') abort(403);

        DB::table('empleados')->insert([
            'nombre' => $request->nombre,
            'puesto' => $request->puesto,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('empleados');
    })->name('empleados.guardar');

    Route::get('/empleados/{id}/editar', function ($id) {
        if (auth()->user()->rol !== 'admin') abort(403);

        $empleado = DB::table('empleados')->where('id', $id)->first();

        if (!$empleado) abort(404);

        return view('editar_empleado', compact('empleado'));
    })->name('empleados.editar');

    Route::post('/empleados/{id}/actualizar', function (Request $request, $id) {
        if (auth()->user()->rol !== 'admin') abort(403);

        DB::table('empleados')->where('id', $id)->update([
            'nombre' => $request->nombre,
            'puesto' => $request->puesto,
            'estado' => $request->estado,
            'updated_at' => now(),
        ]);

        return redirect()->route('empleados');
    })->name('empleados.actualizar');

    Route::post('/empleados/{id}/eliminar', function ($id) {
        if (auth()->user()->rol !== 'admin') abort(403);

        DB::table('empleados')->where('id', $id)->delete();

        return redirect()->route('empleados');
    })->name('empleados.eliminar');

    Route::get('/admin/vacaciones', function () {
        if (auth()->user()->rol !== 'admin') abort(403);

        $solicitudes = DB::table('solicitudes_vacaciones')
            ->join('users', 'solicitudes_vacaciones.user_id', '=', 'users.id')
            ->select('solicitudes_vacaciones.*', 'users.name as empleado')
            ->orderBy('solicitudes_vacaciones.id', 'desc')
            ->get();

        return view('admin_vacaciones', compact('solicitudes'));
    })->name('admin.vacaciones');

    Route::post('/admin/vacaciones/{id}/estado', function (Request $request, $id) {
        if (auth()->user()->rol !== 'admin') abort(403);

        DB::table('solicitudes_vacaciones')
            ->where('id', $id)
            ->update([
                'estado' => $request->estado,
                'comentario_admin' => $request->comentario_admin ?? null,
                'updated_at' => now(),
            ]);

        return redirect()->route('admin.vacacions');
    })->name('admin.vacacions.estado');

    Route::get('/admin/permisos', function () {
        if (auth()->user()->rol !== 'admin') abort(403);

        $permisos = DB::table('solicitudes_permisos')
            ->join('users', 'solicitudes_permisos.user_id', '=', 'users.id')
            ->select('solicitudes_permisos.*', 'users.name as empleado')
            ->orderBy('solicitudes_permisos.id', 'desc')
            ->get();

        return view('admin_permisos', compact('permisos'));
    })->name('admin.permisos');

    Route::post('/admin/permisos/{id}/estado', function (Request $request, $id) {
        if (auth()->user()->rol !== 'admin') abort(403);

        DB::table('solicitudes_permisos')
            ->where('id', $id)
            ->update([
                'estado' => $request->estado,
                'comentario_admin' => $request->comentario_admin,
                'updated_at' => now(),
            ]);

        return redirect()->route('admin.permisos');
    })->name('admin.permisos.estado');

    Route::get('/reportes', function () {
        if (auth()->user()->rol !== 'admin') abort(403);

        $totalEmpleados = DB::table('empleados')->count();

        $vacacionesPendientes = DB::table('solicitudes_vacaciones')->where('estado', 'Pendiente')->count();
        $vacacionesAprobadas = DB::table('solicitudes_vacaciones')->where('estado', 'Aprobado')->count();
        $vacacionesRechazadas = DB::table('solicitudes_vacaciones')->where('estado', 'Rechazado')->count();

        $permisosPendientes = DB::table('solicitudes_permisos')->where('estado', 'Pendiente')->count();
        $permisosAprobados = DB::table('solicitudes_permisos')->where('estado', 'Aprobado')->count();
        $permisosRechazados = DB::table('solicitudes_permisos')->where('estado', 'Rechazado')->count();

        return view('reportes', compact(
            'totalEmpleados',
            'vacacionesPendientes',
            'vacacionesAprobadas',
            'vacacionesRechazadas',
            'permisosPendientes',
            'permisosAprobados',
            'permisosRechazados'
        ));
    })->name('reportes');

    /* ================= SOPORTE TECNICO ================= */

Route::get('/soporte', function () {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    $totalUsuarios = DB::table('users')->count();
    $totalEmpleados = DB::table('empleados')->count();
    $totalVacaciones = DB::table('solicitudes_vacaciones')->count();
    $totalPermisos = DB::table('solicitudes_permisos')->count();

    return view('soporte', compact(
        'totalUsuarios',
        'totalEmpleados',
        'totalVacaciones',
        'totalPermisos'
    ));
})->name('soporte');

Route::get('/soporte/usuarios', function () {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    $usuarios = DB::table('users')->orderBy('id', 'desc')->get();

    return view('soporte_usuarios', compact('usuarios'));
})->name('soporte.usuarios');

Route::get('/soporte/usuarios/nuevo', function () {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    return view('soporte_nuevo_usuario');
})->name('soporte.usuarios.nuevo');

Route::post('/soporte/usuarios/guardar', function (Request $request) {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol' => strtolower($request->rol),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('soporte.usuarios');
})->name('soporte.usuarios.guardar');

Route::get('/soporte/usuarios/{id}/editar', function ($id) {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    $usuario = DB::table('users')->where('id', $id)->first();

    if (!$usuario) abort(404);

    return view('soporte_editar_usuario', compact('usuario'));
})->name('soporte.usuarios.editar');

Route::post('/soporte/usuarios/{id}/actualizar', function (Request $request, $id) {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    DB::table('users')->where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'rol' => strtolower($request->rol),
        'updated_at' => now(),
    ]);

    return redirect()->route('soporte.usuarios');
})->name('soporte.usuarios.actualizar');

Route::post('/soporte/usuarios/{id}/password', function (Request $request, $id) {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    $request->validate([
        'password' => 'required|min:6',
    ]);

    DB::table('users')->where('id', $id)->update([
        'password' => Hash::make($request->password),
        'updated_at' => now(),
    ]);

    return redirect()->route('soporte.usuarios');
})->name('soporte.usuarios.password');

Route::post('/soporte/usuarios/{id}/eliminar', function ($id) {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    DB::table('users')->where('id', $id)->delete();

    return redirect()->route('soporte.usuarios');
})->name('soporte.usuarios.eliminar');

Route::get('/soporte/roles', function () {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    $usuarios = DB::table('users')->orderBy('id', 'desc')->get();

    return view('soporte_roles', compact('usuarios'));
})->name('soporte.roles');

Route::post('/soporte/roles/{id}', function (Request $request, $id) {
    if (strtolower(trim(auth()->user()->rol)) !== 'programador') abort(403);

    DB::table('users')->where('id', $id)->update([
        'rol' => strtolower($request->rol),
        'updated_at' => now(),
    ]);

    return redirect()->route('soporte.roles');
})->name('soporte.roles.guardar');
    /* ================= EMPLEADO ================= */

    Route::get('/menu-empleado', function () {
        if (auth()->user()->rol !== 'empleado') abort(403);

        return view('menu_empleado');
    })->name('menu.empleado');

    Route::get('/perfil', function () {
        if (auth()->user()->rol !== 'empleado') abort(403);

        return view('perfil');
    })->name('perfil');

    Route::get('/editar-perfil', function () {
        if (auth()->user()->rol !== 'empleado') abort(403);

        return view('editar_perfil');
    })->name('editar.perfil');

    Route::get('/vacaciones', function () {
        if (auth()->user()->rol !== 'empleado') abort(403);

        return view('vacaciones');
    })->name('vacaciones');

    Route::post('/vacaciones/guardar', function (Request $request) {
        if (auth()->user()->rol !== 'empleado') abort(403);

        DB::table('solicitudes_vacaciones')->insert([
            'user_id' => auth()->id(),
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'motivo' => $request->motivo,
            'estado' => 'Pendiente',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mis.solicitudes');
    })->name('vacaciones.guardar');

    Route::get('/mis-solicitudes', function () {
        if (auth()->user()->rol !== 'empleado') abort(403);

        $solicitudes = DB::table('solicitudes_vacaciones')
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return view('mis_solicitudes', compact('solicitudes'));
    })->name('mis.solicitudes');

    Route::get('/solicitar-permiso', function () {
        if (auth()->user()->rol !== 'empleado') abort(403);

        return view('permisos');
    })->name('empleado.permisos');

    Route::post('/permisos/guardar', function (Request $request) {
        if (auth()->user()->rol !== 'empleado') abort(403);

        DB::table('solicitudes_permisos')->insert([
            'user_id' => auth()->id(),
            'fecha' => $request->fecha,
            'motivo' => $request->motivo,
            'estado' => 'Pendiente',
            'comentario_admin' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mis.permisos');
    })->name('permisos.guardar');

    Route::get('/mis-permisos', function () {
        if (auth()->user()->rol !== 'empleado') abort(403);

        $permisos = DB::table('solicitudes_permisos')
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return view('mis_permisos', compact('permisos'));
    })->name('mis.permisos');

});