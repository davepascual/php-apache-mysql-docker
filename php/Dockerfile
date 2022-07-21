FROM php:5.4-apache
# Create a directory where uploaded files will be stored.
RUN mkdir /var/www/html/uploads
# Change its ownership to www-data to resolve write permission error. By default it is only accessible by root user.
RUN chown www-data: /var/www/html/uploads

# Install PHP extensions, and enable it.
RUN  docker-php-ext-install mysql && docker-php-ext-enable mysql

# Uncomment this line for mysqli extension
# RUN  docker-php-ext-install mysqli && docker-php-ext-enable mysqli

