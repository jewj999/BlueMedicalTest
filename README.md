
## Requerimientos
- PHP >= 8.1
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- Filter PHP Extension
- Hash PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Session PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
## Instrucciones de instalación

1. Clonar el repositorio
2. Crear un archivo .env en la raíz del proyecto y copiar el contenido del archivo .env.example
3. Realizar la configuración de la base de datos en el archivo .env
4. Ejectuar el comando `composer install`
5. Ejectuar el comando `php artisan key:generate`
6. Ejectuar el comando `php artisan migrate`
7. Ejectuar el comando `php artisan db:seed`
8. Ejecutar el comando `php artisan serve`
9. Envíar peticiones a la API (Se proporciona un archivo de colección de insomnia rest client con los EPs)
