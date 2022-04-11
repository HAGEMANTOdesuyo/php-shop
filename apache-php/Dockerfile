FROM php:7.4.9-apache
#FROM php:7.2-apache
RUN apt-get update && \
  apt-get install -y libonig-dev \
  zip && \
  # PHPのExtensionをインストール
  #docker-php-ext-install pdo_mysql mysqli mbstring
  docker-php-ext-install pdo_mysql mysqli

#WORKDIR /var/www/laravel_docker

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#EXPOSE 80
