<?php
// public/index.php

// 1. Cargamos las librerías del src
// Usamos __DIR__ para asegurar que las rutas sean correctas independientemente de dónde se ejecute
require_once __DIR__ . '/../src/datos.php';
require_once __DIR__ . '/../src/validaciones.php';
require_once __DIR__ . '/../src/vistas.php';

// 2. Inicialización de variables
$errores = [];
$datos = [];
$mostrarResumen = false;

// Cargamos listas de datos
$listas = [
    'provincias' => obtenerProvincias(),
    'sedes' => obtenerSedes(),
    'departamentos' => obtenerDepartamentos()
];

// 3. Procesar Formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Sanitización básica
    $datos['nombre'] = sanitizar($_POST['nombre'] ?? '');
    $datos['apellidos'] = sanitizar($_POST['apellidos'] ?? '');
    $datos['dni'] = sanitizar($_POST['dni'] ?? '');
    $datos['email'] = sanitizar($_POST['email'] ?? '');
    $datos['telefono'] = sanitizar($_POST['telefono'] ?? '');
    $datos['fecha'] = sanitizar($_POST['fecha'] ?? '');
    $datos['provincia'] = sanitizar($_POST['provincia'] ?? '');
    $datos['sede'] = sanitizar($_POST['sede'] ?? '');
    $datos['departamento'] = sanitizar($_POST['departamento'] ?? '');

    // Validaciones
    if (!validarRequerido($datos['nombre'])) $errores['nombre'] = "El nombre es obligatorio.";
    if (!validarRequerido($datos['apellidos'])) $errores['apellidos'] = "Los apellidos son obligatorios.";
    
    if (!validarRequerido($datos['dni'])) {
        $errores['dni'] = "El DNI es obligatorio.";
    } elseif (!validarDni($datos['dni'])) {
        $errores['dni'] = "El formato del DNI o la letra no son válidos.";
    }

    if (!validarRequerido($datos['email'])) {
        $errores['email'] = "El email es obligatorio.";
    } elseif (!validarEmail($datos['email'])) {
        $errores['email'] = "El formato del email no es válido.";
    }

    if (!validarRequerido($datos['telefono'])) {
        $errores['telefono'] = "El teléfono es obligatorio.";
    } elseif (!validarTelefono($datos['telefono'])) {
        $errores['telefono'] = "El teléfono debe tener 9 dígitos.";
    }

    if (!validarRequerido($datos['fecha'])) $errores['fecha'] = "La fecha es obligatoria.";
    if (!validarRequerido($datos['provincia'])) $errores['provincia'] = "Selecciona una provincia.";
    if (!validarRequerido($datos['sede'])) $errores['sede'] = "Selecciona una sede.";
    if (!validarRequerido($datos['departamento'])) $errores['departamento'] = "Selecciona un departamento.";

    // Si no hay errores, mostramos resumen
    if (empty($errores)) {
        $mostrarResumen = true;
    }
}

// 4. Renderizar Vista
pintarHeader("Gestión de Empleados");

if ($mostrarResumen) {
    pintarResumen($datos);
} else {
    pintarFormulario($datos, $errores, $listas);
}

pintarFooter();
?>