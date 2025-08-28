# Usa imagem com PHP + Apache
FROM php:8.2-apache

# Instala extensões comuns do PHP (se precisar, pode adicionar outras)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Habilita o mod_rewrite (caso use URLs amigáveis)
RUN a2enmod rewrite

# Copia todos os arquivos do projeto para dentro do container
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html/

# Ajusta permissões (opcional, mas ajuda)
RUN chown -R www-data:www-data /var/www/html