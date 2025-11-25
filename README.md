Proyecto: 
Gestión de Empleados (Fase 1 - IAW)

Este repositorio contiene la Fase 1 del proyecto para el módulo de Implantación de Aplicaciones Web (IAW) y Cloud Computing. 
Consiste en el desarrollo de una aplicación modular en PHP para el registro de empleados, centrada en la validación de datos en el servidor y la organización limpia del código.

Descripción

La aplicación presenta un formulario de alta de empleados que procesa la información enviada mediante POST. En esta fase, no se utiliza base de datos; la información de los desplegables (provincias, sedes, departamentos) se carga dinámicamente desde arrays en PHP.

Funcionalidades y Requisitos Cumplidos

Validación de datos: Se comprueba que todos los campos obligatorios estén rellenos.
Validaciones específicas:
DNI: Validación algorítmica completa (cálculo de letra con módulo 23).

Email: Comprobación de formato válido.

Teléfono: Verificación de longitud y formato numérico.

Sanitización: Limpieza de entradas para evitar inyecciones de código (XSS).

Modularidad: Separación lógica entre vistas, datos y validaciones.

Feedback: Mensajes de error claros situados junto a cada campo y resumen de datos tras un alta correcta.

 Estructura del Proyecto
 
El proyecto sigue una estructura modular para separar la lógica pública del núcleo de la aplicación:

BitBucket/

├── public/              # DOCUMENT ROOT (Accesible desde navegador)

│    └── index.php        # Controlador frontal: Recibe datos y gestiona la vista

├── src/                 # LÓGICA DE NEGOCIO (No accesible directamente)

│     ├── datos.php        # "Simulación de BD": Arrays de provincias, sedes, deptos.

 │    ├── validaciones.php # Funciones de validación (validarDni, validarEmail...)

│    └── vistas.php       # Funciones para pintar HTML (pintarHeader, formularios...)

└── README.md            # Documentación del proyecto


 Instrucciones de Ejecución
 
Para evaluar o probar el proyecto en un entorno local:

Requisitos

Tener instalado PHP (versión 7.4 o superior recomendada).

Navegador web moderno.

Pasos para ejecutar

Clonar el repositorio:

git clone [https://bitbucket.org/TU_USUARIO/nombre-repo.git](https://bitbucket.org/TU_USUARIO/nombre-repo.git)

cd nombre-repo


Levantar el servidor local:

Ejecuta el siguiente comando desde la raíz del proyecto para iniciar el servidor interno de PHP apuntando a la carpeta public:

php -S localhost:8000 -t public



Acceder:

Abre en tu navegador la dirección: http://localhost:8000

(Nota: También es compatible con servidores Apache/Nginx como XAMPP o WAMP, colocando la carpeta en htdocs y accediendo a la ruta correspondiente).

Tecnologías

Backend: PHP Nativo.

Frontend: HTML5 + CSS (Tailwind CSS vía CDN).

Control de Versiones: Git.

Autor: Sergio Coca Páez

Asignatura: Implantación de Aplicaciones Web (IAW) y Cloud Computing
