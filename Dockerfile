# Dockerfile for PHP with PDO MySQL
FROM php:8.3-apache

# Install PDO MySQL
RUN docker-php-ext-install pdo_mysql

# Update and install system packages (e.g., ping)
RUN apt-get update && apt-get install -y iputils-ping
