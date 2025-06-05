# 📝 Gestor de Tareas en PHP

Este proyecto es una aplicación sencilla en PHP para gestionar tareas desde la consola o una interfaz web. Permite agregar, eliminar, listar y completar tareas usando clases y almacenamiento en un archivo JSON.

## ✨ Características

- Añadir nuevas tareas con título, descripción y estado.
- Listar todas las tareas actuales.
- Eliminar una tarea específica.
- Marcar una tarea como completada.
- Interfaz web opcional (HTML, JS y CSS) conectada a API en PHP.

## 📦 Requisitos

- PHP 7.0 o superior.
- Navegador web moderno (para la versión con interfaz).
- Terminal o consola (para ejecutar scripts CLI).
- Archivo `registros.json` accesible con permisos de lectura y escritura.

## 🚀 Instalación

1. Clona este repositorio o descarga los archivos:

   ```bash
   git clone https://github.com/tu-usuario/gestor-tareas.git
   cd gestor-tareas
   ```

2. Inicia el servidor PHP desde la raíz o la carpeta `public`:

   ```bash
   php -S localhost:8000 -t public
   ```

3. Abre tu navegador y accede a:

   ```
   http://localhost:8000
   ```

## 📁 Estructura del Proyecto

```
Gestor-Tareas/
├── clases/
│   ├── Tarea.php               # Clase para cada tarea
│   └── GestorTarea.php         # Clase que gestiona todas las tareas
│
├── public/
│   ├── index.html              # Interfaz web
│   ├── estilos.css             # Estilos de la interfaz
│   ├── main.js                 # Lógica frontend (fetch API)
│   ├──data/
│   |   ├── registros.json      # Archivo donde se almacenan las tareas
|   |
|   └── api/
│       ├── listar.php          # Endpoint para listar tareas
│       ├── crear.php           # Endpoint para crear tareas
│       ├── eliminar.php        # Endpoint para eliminar tareas
│       └── completar.php       # Endpoint para marcar tareas como completadas
│
└── README.md
```

## 🤝 Contribuciones

Si quieres mejorar este proyecto, eres bienvenido a enviar pull requests o reportar issues. Toda contribución es apreciada.

## 📄 Licencia

Este proyecto está licenciado bajo la MIT License.
