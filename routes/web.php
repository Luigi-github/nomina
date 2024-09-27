<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpleadoController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de autenticación
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'register']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutas protegidas para la gestión de empleados
Route::middleware(['auth'])->group(function () {

// Rutas para gestionar empleados
    Route::prefix('empleados')->group(function () {
        Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');       // Listar empleados
        Route::get('/create', [EmpleadoController::class, 'create'])->name('empleados.create'); // Mostrar formulario de creación
        Route::post('/store', [EmpleadoController::class, 'store'])->name('empleados.store');  // Guardar un nuevo empleado
        Route::get('/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit'); // Mostrar formulario de edición
        Route::put('/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');  // Actualizar empleado
        Route::delete('/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy'); // Eliminar empleado (lógica)
    });
});

