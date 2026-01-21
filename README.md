# Clothing Store 🛍️

Bienvenido al repositorio de **Clothing Store**, una aplicación de comercio electrónico moderna construida con **Laravel 11** y **Docker**.

## 🚀 Requisitos Previos

Para ejecutar este proyecto, no necesitas instalar PHP, Composer ni MySQL en tu máquina local. Solo necesitas:

- **Docker Desktop** instalado y corriendo.
- **Git** para clonar el repositorio.
- **WSL2** (si estás en Windows) recomendado para mejor rendimiento.

## 🛠️ Instalación y Despliegue Local

Sigue estos pasos para levantar el proyecto en tu máquina:

### 1. Clonar el repositorio
```bash
git clone https://github.com/develeacid/clothing-store.git
cd clothing-store
```

### 2. Configurar variables de entorno
Crea tu archivo `.env` copiando el ejemplo:
```bash
cp .env.example .env
```

### 3. Instalar dependencias (vía Docker)
Utilizamos una pequeña imagen de Docker para instalar las dependencias de Composer sin ensuciar tu sistema:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

### 4. Iniciar los contenedores (Sail)
Levanta la infraestructura (App, MySQL, Redis, Mailpit):
```bash
./vendor/bin/sail up -d
```
> **Nota**: Si estás en Windows Powershell y no usas WSL directamente, puedes usar `docker compose up -d`.

### 5. Configurar la aplicación
Una vez que los contenedores estén arriba, genera la clave de la aplicación y corre las migraciones:
```bash
# Generar Key
./vendor/bin/sail artisan key:generate

# Migrar base de datos
./vendor/bin/sail artisan migrate
```

¡Listo! Accede a tu tienda en: [http://localhost](http://localhost)

## 🐳 Comandos Útiles (Docker / Sail)

Este proyecto usa **Laravel Sail** como interfaz para Docker.

| Acción | Comando |
| :--- | :--- |
| **Iniciar servidores** | `./vendor/bin/sail up -d` |
| **Detener servidores** | `./vendor/bin/sail stop` |
| **Ver logs** | `./vendor/bin/sail logs -f` |
| **Ejecutar comandos Artisan** | `./vendor/bin/sail artisan <comando>` |
| **Instalar paquete Composer** | `./vendor/bin/sail composer require <paquete>` |
| **Instalar paquete NPM** | `./vendor/bin/sail npm install <paquete>` |
| **Consola de MySQL** | `./vendor/bin/sail mysql` |

## 📧 Email Testing
El proyecto incluye **Mailpit** para interceptar emails en desarrollo.
Accede al panel de emails en: [http://localhost:8025](http://localhost:8025)

## 🤝 Contribución
1. Haz un Fork del proyecto.
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`).
3. Haz Commit de tus cambios (`git commit -m 'Add some AmazingFeature'`).
4. Haz Push a la rama (`git push origin feature/AmazingFeature`).
5. Abre un Pull Request.

---
Desarrollado con ❤️ usando Laravel y Docker.
