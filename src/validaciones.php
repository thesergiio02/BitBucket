<?php
// src/validaciones.php

/**
 * Limpia los datos de entrada para evitar XSS y espacios innecesarios
 */
function sanitizar($dato) {
    return htmlspecialchars(trim($dato));
}

/**
 * Valida si un campo está vacío
 */
function validarRequerido($valor) {
    return !empty($valor);
}

/**
 * Valida formato de Email
 */
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Valida un DNI español (básico: 8 números y 1 letra)
 * Nota: Se puede mejorar calculando la letra real.
 */
function validarDni($dni) {
    $dni = strtoupper($dni);
    // Regex simple: 8 dígitos seguidos de una letra
    if (!preg_match('/^[0-9]{8}[A-Z]{1}$/', $dni)) {
        return false;
    }
    
    // Validación de la letra correcta
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    $letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
    
    // Calculamos el índice (Módulo 23)
    $indice = $numeros % 23;
    
    return $letra === $letrasValidas[$indice];
}

/**
 * Valida formato de teléfono (9 dígitos)
 */
function validarTelefono($telefono) {
    return preg_match('/^[0-9]{9}$/', $telefono);
}
?>