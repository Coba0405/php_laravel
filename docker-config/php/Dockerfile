FROM php:8.2-fpm
COPY php.ini /usr/local/etc/php/

# install composer
# php7.4の環境で使用する記述のため以下へ修正
# RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# Composerのインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Composerのバージョン確認
RUN composer --version


# install packages
RUN apt-get update \
    && apt-get install -y \
    gcc \
    make \
    libpng-dev \
    git \
    unzip \
    vim \
    # libsodium-dev \
    mariadb-client \
    curl \
    gnupg \
    openssl
    # docker-php-ext-installでzipの拡張機能をインストールするので'zlib1g-devは不要'
    # zlib1g-dev \ 

    # install stable node and latest npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash
RUN apt-get install -y nodejs 
RUN apt-get install -y npm
RUN docker-php-ext-install pdo_mysql

# install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /var/www
ADD . /var/www
RUN chown -R www-data:www-data /var/www

