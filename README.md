# Aplicación web - Turnos cefor

## Importante

Aplicación web para gestionar el pase turnos en la central de inscripciones de la DIDECUFI

## Development Setup

### Table of contents

- [Requerimientos](#requerimientos)
- [Clonar repositirio de GitHub](#clonar-repositorio-de-github)
- [Instalar dependencias de Laravel](#instalar-dependencias-de-laravel)
- [Correr Migraciones](#correr-migraciones)
- [Medios Multimedia](#medios-multimedia)
- [Ejecutar App](#ejecutar-app)

## Requerimientos

La aplicación web se encuentra implementada en el framework de Laravel 10, por ello es necesario contar con php, Composer, Xampp y de ser necesario, 7zip.

Se pueden los requerimientos mencionados en los siguentes links:

- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Xampp](https://www.apachefriends.org/es/download.html)
- [7zip](https://7-zip.org/download.html)

## Clonar repositorio de GitHub

Teniendo el software requerido, el siguiente paso es abrir una terminal que permita el uso de Git Bash\* y seguir las siguientes indicaciones:

- Diríjase a la carpeta donde va a alojar el proyecto Laravel, por ejemplo:

    ```bash
    cd /project/
    ```

- Clone el repositorio en la ubicación seleccionada:

    ```bash
    git clone https://github.com/MrVoltok/Turnos-CEFOR.git

    cd DocsCONDDE/
    ```

## Instalar dependencias de Laravel

### vendor y NodeJs

Por defecto, al clonar un repo desde Github, no se incluyen **vendor** ni **Node Js**. Para poder obtener dichas dependencias siga los siguientes pasos en una terminal con la ubicación del repositorio.

```bash
composer install

npm install

npm run build
```

### env file

Del mismo caso, el archivo _.env_ no existe al clonar el repositorio.
Para obtener el archivo .env, sólo hay que crear un archivo _.env_ y copiar el contenido del archivo _.env.example_.

Al pasar el contenido al archivo _.env_, notará que el campo **APP_KEY** está vacío. Para obtener dicha llaver, en una terminal escriba lo siguiente:

```bash
php artisan key:generate
```

A modo de conveniencia, en el campo **DB_DATABASE** debe tener el nombre _turnos-dicufi_. A su vez asegúrese que el campo **DB_CONNECTION** debe tener el valor _mysql_.

Otro aspecto es el campo **APP_NAME**, cuyo valor debe ser sustituido por el nombre del proyecto: **turnos_dicufi**.

## Correr Migraciones

Para trabajar con la base de datos se debe de realizar lo siguiente.

### Migraciones

Antes de ejecutar el programa por primera vez, es necasrio migrar las tablas creadas en el proyecto actual. La migración se realiza de la siguiente manera:

```bash
php artisan migrate
```

## Medios multimedia

En una terminal escriba lo siguiente:

```bash
php artisan storage:link
```

## Ejecutar App

Para ejecutar la aplicación web de forma local, es necesario aplicar los siguientes paso:

- Abra una terminal y escriba el siguiente comando:

    ```bash
    php artisan serve
    ```

- Abra otra terminal y ejecute el siguiente comando:

    ```bash
    npm run dev

Puede usar la aplicación web al ingresar al navegador web de su preferencia y en el buscador escribir lo siguiente:

**127.0.0.1:8000**, o bien, **localhost:8000**

Es importante mencionar que estos comandos habilitan el servidor local, por lo que deben de estar ejecutándose en todo el momento.
