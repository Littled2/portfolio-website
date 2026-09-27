FROM php:8.2-apache

# Enable mod_rewrite (needed for .htaccess)
RUN a2enmod rewrite

# Allow .htaccess to override Apache config
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy site into Apache's webroot
COPY . /var/www/html/

# Ensure the image cache directory exists and is writable by the web server
RUN mkdir -p /var/www/html/resources/images/project-images \
    && chown -R www-data:www-data /var/www/html/resources \
    && chmod -R 775 /var/www/html/resources

EXPOSE 80