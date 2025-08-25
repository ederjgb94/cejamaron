# Cejamaron


## Descripción

Cejamaron es una aplicación web construida con el framework [Laravel](https://laravel.com). Este proyecto está diseñado para que consuman la API desde un proyecto .NET.

## Características principales

- [Lista de funcionalidades clave de tu proyecto]
- Ejemplo: Registro y autenticación de usuarios
- Ejemplo: Panel de administración
- Ejemplo: Gestión de productos/eventos/usuarios

## Instalación

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/ederjgb94/cejamaron.git
   cd cejamaron
   ```

2. **Instala las dependencias**
   ```bash
   composer install
   npm install
   ```

3. **Configura el entorno**
   - Copia el archivo `.env.example` a `.env`
   - Configura tus credenciales de base de datos y otras variables en `.env`

4. **Genera la clave de la aplicación**
   ```bash
   php artisan key:generate
   ```

5. **Migraciones y seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Compila los assets (opcional)**
   ```bash
   npm run dev
   ```

## Uso

- Accede a la aplicación localmente con `php artisan serve`
- Ingresa a `http://localhost:8000` en tu navegador

## Tecnologías utilizadas

- Laravel
- PHP
- MySQL
- JavaScript (Vue.js, opcional)
- [.NET para consumo de la API]

## Contribución

¡Contribuciones son bienvenidas! Por favor revisa la [guía de contribución](CONTRIBUTING.md) antes de enviar un pull request.

## Licencia

Este proyecto está bajo la licencia [MIT](LICENSE).

## Autor

Desarrollado por [ederjgb94](https://github.com/ederjgb94).

---

> _Este README está basado en la plantilla oficial de Laravel, adaptado para el proyecto cejamaron._
