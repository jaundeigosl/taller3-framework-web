Guía de Instalación y Despliegue: taller 3

1. Requisitos Previos (Instalación de Herramientas):

A. Servidor Local (XAMPP)
XAMPP nos proporciona el servidor Apache y la base de datos MySQL.

Descarga XAMPP desde apachefriends.org.

Instálalo y asegúrate de activar los módulos Apache y MySQL desde el Panel de Control de XAMPP.

Importante: Verifica que tu versión de PHP sea la 8.2 o superior, necesaria para Laravel 12.

B. Manejador de Dependencias (Composer)
Composer es la herramienta que descarga todas las librerías de Laravel.

Descarga e instala desde getcomposer.org.

Durante la instalación, te pedirá la ruta del ejecutable de PHP (generalmente C:\xampp\php\php.exe).

C. Entorno de Node.js (Vite/Tailwind)
Como el proyecto usa Tailwind CSS, necesitamos Node.js para compilar los estilos.

Descarga la versión LTS de nodejs.org.

2. Configuración del Proyecto
Una vez instaladas las herramientas, sigue estos pasos en tu terminal (CMD, PowerShell o la terminal de VS Code):

Paso 1: Clonar e instalar dependencias
Bash
# Instalar librerías de PHP
composer install

# Instalar librerías de JavaScript (Tailwind CSS)
npm install
Paso 2: Configurar el archivo de entorno
Copia el archivo de ejemplo .env.example y cámbiale el nombre a .env. Luego, genera la clave de seguridad:

Bash
php artisan key:generate

Paso 3: Configurar la Base de Datos
Abre tu archivo .env y busca las líneas de conexión. Cámbialas según tu configuración de XAMPP (por defecto es así):

Fragmento de código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller
DB_USERNAME=root
DB_PASSWORD=

Nota: al ejecutar la migracion, esta creara automaticamente la base de datos

3. Base de Datos: Migraciones y Seeders
Aquí es donde creamos las tablas y cargamos los datos de prueba que hemos programado.

Ejecutar Migraciones
Esto creará las tablas users, personal_data, phones y emails con sus relaciones en cascada.

Bash
php artisan migrate
Poblado de Datos (Seeders)
Hemos unificado la lógica para que el sistema tenga un administrador y 20 empleados con sus contactos vinculados.

Bash
# Ejecuta el seeder que crea el admin y los 20 empleados
php artisan db:seed

4. Ejecución del Sistema
Para ver el proyecto funcionando, necesitas mantener dos terminales abiertas:

Terminal 1 (Servidor PHP):

Bash
php artisan serve
Esto te dará una URL, usualmente http://127.0.0.1:8000.

Terminal 2 (Compilación de Estilos):

Bash
npm run dev
Esto es vital para que Tailwind CSS y el Side Menu Sticky se vean correctamente.

5. Usuario de Acceso

Login con el usuario admin y clave 123456.

NOTAS: 
Puede crear otro usuario administrar diferente al ya existente pero los 20 registros de personas estan asociados al usuario que se crea por defecto.
Si de igual manera desea probar el registro, todas las funcionalidades del CRUD siguen disponibles.
El formato de teléfono es: 0000-0000000 (obligatorio el guion).


