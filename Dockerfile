# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilitamos mod_rewrite por si queremos URLs amigables en el futuro
RUN a2enmod rewrite

# Copiamos el código fuente al contenedor
# NOTA: Apache sirve por defecto /var/www/html. 
# Como nuestro index.php está en public/, copiamos el contenido de public allí.
COPY public/ /var/www/html/

# Copiamos la carpeta src un nivel arriba (fuera del acceso web directo por seguridad)
COPY src/ /var/www/src/

# Damos permisos al usuario de www-data (opcional pero recomendado)
RUN chown -R www-data:www-data /var/www/html \
    && chown -R www-data:www-data /var/www/src