# Nomina App

## Descripción
La aplicación **Nomina App** es una herramienta web desarrollada en Laravel para gestionar la información de nómina de empleados en una organización. Permite registrar, actualizar y eliminar empleados, así como gestionar sus cargos y jefes inmediatos.

## Requisitos
- PHP >= 7.3
- Composer
- Laravel 8
- SQLite (o cualquier otro gestor de base de datos compatible)
- Node.js y npm (para compilar los assets)

## Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tu_usuario/tu_repositorio.git
   ```

2. **Acceder al directorio del proyecto**
   ```bash
   cd tu_repositorio
   ```

3. **Instalar dependencias con Composer**
   ```bash
   composer install
   ```

4. **Configurar el archivo de entorno**
   - Copia el archivo `.env.example` a `.env`
   ```bash
   cp .env.example .env
   ```
   - Configura tu conexión a la base de datos en el archivo `.env`. Asegúrate de que `DB_CONNECTION` esté configurado para SQLite:
   ```plaintext
   DB_CONNECTION=sqlite
   DB_DATABASE=/ruta/a/tu/base_de_datos/nomina.db
   ```

5. **Crear la base de datos**
   - Si estás usando SQLite, asegúrate de que el archivo de base de datos existe o se creará automáticamente al migrar.

6. **Ejecutar las migraciones**
   ```bash
   php artisan migrate
   ```

7. **Ejecutar los seeders (opcional)** 
   - Si tienes seeders para poblar la base de datos, ejecútalos con:
   ```bash
   php artisan db:seed
   ```

8. **Compilar los assets (opcional)** 
   - Si utilizas Vue.js o cualquier otro paquete de frontend, asegúrate de compilar los assets:
   ```bash
   npm install
   npm run dev
   ```

9. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

   Ahora puedes acceder a la aplicación en tu navegador en `http://localhost:8000`.

## Uso

- **Registro de Usuarios**: Los usuarios pueden registrarse y acceder a la aplicación.
- **Gestión de Empleados**: Los administradores pueden crear, listar, editar y eliminar empleados.
- **Gestión de Cargos y Jefes**: Los usuarios pueden asignar cargos a los empleados y definir sus jefes inmediatos.

## Estructura de Carpetas
```
nomina/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   ├── Models/
│   └── ...
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── ...
├── resources/
│   ├── views/
│   ├── js/
│   └── css/
└── routes/
    └── web.php
```

## Tecnologías Utilizadas
- **Backend**: Laravel 8, PHP
- **Frontend**: Blade, Bootstrap, Vue.js
- **Base de Datos**: SQLite
