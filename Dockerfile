FROM php:8.2-apache

# Enable mod_rewrite (needed for .htaccess)
RUN a2enmod rewrite

# Allow .htaccess to override Apache config
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy site into Apache's webroot
COPY . /var/www/html/

EXPOSE 80