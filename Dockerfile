# Imagem
FROM php:8.1.1-fpm

# Argumentos
ARG user
ARG uid

# Instala dependencias q são obrigatorias para laravel dentro do container
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpa cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala/habilita PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer copia o compose para disponibilizar o uso em todos diretorios da maquina
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
# cria o usuario conforme definido em argumentos
# dá permissao e adiciona a grupo do sistema
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Instala redis # caso precisa
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
# indica a localizaçao dos arquivos e qual usuario
WORKDIR /var/www

USER $user