# Taller 3 - Framework Laravel
Autores: 
* Juan Suárez | C.I: 28.083.693
* Josué Carrión | C.I: 30.020.470

Este proyecto consiste en un sistema de gestión de personal con directorio de empleados, desarrollado bajo el framework Laravel, utilizando una arquitectura de base de datos normalizada para datos personales y de contacto.

1. Requisitos Previos
Antes de comenzar, asegúrate de tener instaladas las siguientes herramientas en tu entorno local:

XAMPP: Proporciona Apache y MySQL.

Versión de PHP: Debe ser 8.2 o superior (requerido para Laravel 11/12).

Composer: Manejador de dependencias de PHP.

Node.js (LTS): Necesario para compilar los estilos con Vite y Tailwind CSS.

2. Configuración del Proyecto
Sigue estos pasos en tu terminal (CMD, PowerShell o Terminal de VS Code) para preparar el entorno:

Paso 1: Instalar Dependencias

# Instalar librerías de PHP
composer install o php composer install

# Instalar librerías de JavaScript y Tailwind CSS
npm install
Paso 2: Preparar el Archivo de Entorno (.env)
⚠️ IMPORTANTE: Laravel requiere un archivo .env para funcionar. Si acabas de clonar el proyecto, este archivo no existe. Debes crearlo antes de generar la clave de la aplicación.

Copia el archivo de ejemplo:

cp .env.example .env
Genera la clave de seguridad de la aplicación:

php artisan key:generate
Paso 3: Configurar la Base de Datos
Abre el archivo .env recién creado y configura tus credenciales de MySQL (XAMPP por defecto):

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller
DB_USERNAME=root
DB_PASSWORD=
Nota: Laravel intentará crear automáticamente la base de datos taller si no existe al momento de migrar.

3. Base de Datos: Estructura y Datos
El proyecto utiliza una arquitectura de tablas relacionadas (users, personal_data, phones, emails) con borrado en cascada para garantizar la integridad.

Migraciones y Poblado (Seeders)
Ejecuta el siguiente comando para crear las tablas y cargar los 20 registros de prueba de una sola vez:

Para realizar las migraciones (crear las tablas)
php artisan migrate 

Para generar los datos (llenar las tablas)
php artisan db:seed

4. Ejecución del Sistema
Para que el sistema funcione correctamente (estilos y backend), debes mantener dos terminales activas:

Terminal 1 (Servidor): php artisan serve

(Accede mediante: http://127.0.0.1:8000)

Terminal 2 (Estilos/Vite): npm run dev

(Indispensable para que el Side Menu y Tailwind carguen correctamente).

5. Acceso y Uso
Credenciales por Defecto

* Usuario: admin
* Clave: 123456
* Pregunta de seguridad:¿Cuál es el nombre de tu primera mascota?
* Respuesta de seguridad: pelusa

Notas de Funcionamiento
Asociación de Datos: Los 20 registros generados por el Seeder están asociados directamente al usuario admin creado por defecto.

CRUD Libre: Puedes registrar nuevos usuarios administradores, pero estos iniciarán con su propio directorio vacío. No obstante, todas las funciones de creación, edición y eliminación de empleados están totalmente operativas.

Regla de Teléfono: Para cumplir con las validaciones de seguridad, los teléfonos deben seguir estrictamente el formato 0000-0000000 (incluyendo el guion).


