# ISTAE - Sitio Web Institucional

Sitio web del **Instituto Superior Tecnológico Alberto Enríquez (ISTAE)**, desarrollado en Laravel. Incluye el sitio público (carreras, admisiones, docentes, normativas, etc.) y un panel administrativo con un asistente virtual con IA (**ISTABot**) que responde preguntas de estudiantes usando una base de conocimiento propia.

## Stack

- PHP 8.1+ / Laravel 10
- MySQL / MariaDB
- Vite (assets del panel admin)
- Bootstrap (sitio público usa Bootstrap 4 + jQuery vía CDN; el panel admin usa Bootstrap 5 del bundle del proyecto — evitar mezclar la API de JS de Bootstrap entre ambos)
- OpenAI Responses API (`file_search` + Vector Stores) para el asistente virtual

## Instalación local

```bash
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

Configura en `.env` al menos:
- Credenciales de base de datos (`DB_*`)
- `OPENAI_API_KEY` (necesaria para que el asistente virtual funcione — sin ella, el chat queda deshabilitado automáticamente)

```bash
php artisan migrate
php artisan serve
```

## Asistente virtual (ISTABot)

Panel de administración: `/admin/chat` (requiere sesión con rol `admin`).

Desde ahí se configura:
- Nombre, ícono y texto de ayuda del botón de chat
- Instrucciones del asistente (system prompt)
- **Memoria de la conversación**: cuántos mensajes recientes se reenvían como contexto en cada turno (afecta el costo por mensaje — ver `app/Services/OpenAiChatService.php`)
- **Base de conocimiento**: archivos (PDF/DOCX/TXT/MD) que el asistente puede citar y ofrecer para descarga
- **Páginas del sitio web**: URLs específicas (no el dominio completo — el sistema no rastrea enlaces) que se leen y actualizan automáticamente

### Actualización automática de páginas web

El comando `php artisan chat:scrape-website` revisa cada página registrada y la actualiza si ya venció su frecuencia configurada (global o por página). Para automatizarlo en producción, agregar un cron apuntando directo al comando (no hace falta `schedule:run` cada minuto si es la única tarea programada):

```bash
/usr/local/bin/php /ruta/al/proyecto/artisan chat:scrape-website
```

## Despliegue (cPanel)

El repo incluye [`.cpanel.yml`](.cpanel.yml) para usar con **Git Version Control** de cPanel. Notas si el hosting no trae Composer preinstalado (común en hosting compartido):

```bash
curl -sS https://getcomposer.org/installer -o composer-setup.php
php -d allow_url_fopen=1 composer-setup.php --install-dir=$HOME --filename=composer.phar
```

y referenciar `$HOME/composer.phar` en las tareas de despliegue en lugar de `composer` global.

Antes del primer despliegue real, confirmar en `.cpanel.yml`:
- Ruta real del document root (`DEPLOYPATH`)
- Ruta del binario de PHP y de `composer.phar` en el servidor

## Seguridad

- `.env` nunca se commitea. Usar `.env.example` como plantilla.
- No dejar archivos con credenciales sueltos en el proyecto (respaldos, capturas, etc.) — revisar `.gitignore` antes de subir cambios si se agregan archivos nuevos con datos sensibles.
