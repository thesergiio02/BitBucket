<?php
// src/datos.php

function obtenerProvincias() {
    return [
        'madrid' => 'Madrid',
        'barcelona' => 'Barcelona',
        'sevilla' => 'Sevilla',
        'valencia' => 'Valencia',
        'malaga' => 'Málaga'
    ];
}

function obtenerSedes() {
    return [
        'central' => 'Sede Central',
        'norte' => 'Delegación Norte',
        'sur' => 'Delegación Sur'
    ];
}

function obtenerDepartamentos() {
    return [
        'rrhh' => 'Recursos Humanos',
        'it' => 'Informática / Desarrollo',
        'marketing' => 'Marketing y Ventas',
        'finanzas' => 'Finanzas'
    ];
}
?>