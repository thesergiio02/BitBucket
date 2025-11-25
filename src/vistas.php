<?php
// src/vistas.php

function pintarHeader($titulo) {
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $titulo . '</title>
        <script src="[https://cdn.tailwindcss.com](https://cdn.tailwindcss.com)"></script>
    </head>
    <body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">';
}

function pintarFooter() {
    echo '</body></html>';
}

/**
 * Genera las opciones <option> de un select
 */
function pintarOpcionesSelect($arrayDatos, $seleccionado = '') {
    $html = '<option value="" disabled ' . ($seleccionado == '' ? 'selected' : '') . '>-- Seleccionar --</option>';
    foreach ($arrayDatos as $clave => $valor) {
        $selected = ($clave == $seleccionado) ? 'selected' : '';
        $html .= "<option value='$clave' $selected>$valor</option>";
    }
    return $html;
}

/**
 * Muestra el resumen de datos cuando todo es correcto
 */
function pintarResumen($datos) {
    ?>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg border-t-4 border-green-500">
        <h2 class="text-2xl font-bold text-green-700 mb-6">¡Empleado registrado con éxito!</h2>
        <ul class="space-y-2 text-gray-700">
            <li><strong>Nombre:</strong> <?= $datos['nombre'] ?> <?= $datos['apellidos'] ?></li>
            <li><strong>DNI:</strong> <?= $datos['dni'] ?></li>
            <li><strong>Email:</strong> <?= $datos['email'] ?></li>
            <li><strong>Teléfono:</strong> <?= $datos['telefono'] ?></li>
            <li><strong>Fecha Alta:</strong> <?= $datos['fecha'] ?></li>
            <li><strong>Provincia:</strong> <?= ucfirst($datos['provincia']) ?></li>
            <li><strong>Sede:</strong> <?= ucfirst($datos['sede']) ?></li>
            <li><strong>Departamento:</strong> <?= ucfirst($datos['departamento']) ?></li>
        </ul>
        <div class="mt-6">
            <a href="index.php" class="block w-full text-center bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Volver al formulario</a>
        </div>
    </div>
    <?php
}

/**
 * Muestra el formulario (con o sin errores)
 */
function pintarFormulario($datos, $errores, $listas) {
    ?>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Alta de Empleado</h1>
        
        <form action="index.php" method="POST" class="space-y-4">
            
            <!-- Nombre y Apellidos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-1">Nombre</label>
                    <input type="text" name="nombre" value="<?= $datos['nombre'] ?? '' ?>" class="w-full border p-2 rounded <?= isset($errores['nombre']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?php if(isset($errores['nombre'])): ?><p class="text-red-500 text-xs mt-1"><?= $errores['nombre'] ?></p><?php endif; ?>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1">Apellidos</label>
                    <input type="text" name="apellidos" value="<?= $datos['apellidos'] ?? '' ?>" class="w-full border p-2 rounded <?= isset($errores['apellidos']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?php if(isset($errores['apellidos'])): ?><p class="text-red-500 text-xs mt-1"><?= $errores['apellidos'] ?></p><?php endif; ?>
                </div>
            </div>

            <!-- DNI y Telefono -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-1">DNI</label>
                    <input type="text" name="dni" placeholder="12345678A" value="<?= $datos['dni'] ?? '' ?>" class="w-full border p-2 rounded <?= isset($errores['dni']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?php if(isset($errores['dni'])): ?><p class="text-red-500 text-xs mt-1"><?= $errores['dni'] ?></p><?php endif; ?>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1">Teléfono</label>
                    <input type="text" name="telefono" value="<?= $datos['telefono'] ?? '' ?>" class="w-full border p-2 rounded <?= isset($errores['telefono']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?php if(isset($errores['telefono'])): ?><p class="text-red-500 text-xs mt-1"><?= $errores['telefono'] ?></p><?php endif; ?>
                </div>
            </div>

            <!-- Email y Fecha -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-1">Email</label>
                    <input type="email" name="email" value="<?= $datos['email'] ?? '' ?>" class="w-full border p-2 rounded <?= isset($errores['email']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?php if(isset($errores['email'])): ?><p class="text-red-500 text-xs mt-1"><?= $errores['email'] ?></p><?php endif; ?>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1">Fecha de Alta</label>
                    <input type="date" name="fecha" value="<?= $datos['fecha'] ?? '' ?>" class="w-full border p-2 rounded <?= isset($errores['fecha']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?php if(isset($errores['fecha'])): ?><p class="text-red-500 text-xs mt-1"><?= $errores['fecha'] ?></p><?php endif; ?>
                </div>
            </div>

            <!-- Selects -->
            <div>
                <label class="block text-gray-700 font-bold mb-1">Provincia</label>
                <select name="provincia" class="w-full border p-2 rounded <?= isset($errores['provincia']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?= pintarOpcionesSelect($listas['provincias'], $datos['provincia'] ?? '') ?>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-1">Sede</label>
                <select name="sede" class="w-full border p-2 rounded <?= isset($errores['sede']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?= pintarOpcionesSelect($listas['sedes'], $datos['sede'] ?? '') ?>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-1">Departamento</label>
                <select name="departamento" class="w-full border p-2 rounded <?= isset($errores['departamento']) ? 'border-red-500' : 'border-gray-300' ?>">
                    <?= pintarOpcionesSelect($listas['departamentos'], $datos['departamento'] ?? '') ?>
                </select>
            </div>

            <!-- Botón -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition">Registrar Empleado</button>
            </div>
        </form>
    </div>
    <?php
}
?>
