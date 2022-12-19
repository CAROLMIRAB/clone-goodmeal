

# backend GOODMEAL
FROM php:8.1-apache as goodbackend

WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
  build-essential \
  libzip-dev \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  libonig-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  vim \
  git \
  curl \
  wget 

# Instalamos composer
RUN wget -O composer-setup.php https://getcomposer.org/installer \ 
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY ./packages/backend  /var/www/backend

WORKDIR /var/www/backend

RUN composer update --no-install --prefer-dist --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

RUN chmod 777 -R /var/www/backend/storage/ \
  && chown -R www-data:www-data /var/www/  \
  && a2enmod rewrite

COPY ./packages/backend/.env.example /var/www/backend/.env
COPY ./packages/backend/backend.conf /etc/apache2/sites-available/
RUN a2ensite backend.conf && a2dissite 000-default.conf && service apache2 restart

RUN php artisan log-viewer:publish
USER root
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80


FROM php:8.1-apache as goodapi

WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
  build-essential \
  libzip-dev \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  libonig-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  vim \
  git \
  curl \
  wget 

# Instalamos composer
RUN wget -O composer-setup.php https://getcomposer.org/installer \ 
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY ./packages/api  /var/www/api

WORKDIR /var/www/api

RUN composer update --no-install --prefer-dist --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

RUN chmod 777 -R /var/www/api/storage/ \
  && chown -R www-data:www-data /var/www/  \
  && a2enmod rewrite

COPY ./packages/api/.env.example /var/www/api/.env
COPY ./packages/api/api.conf /etc/apache2/sites-available/
RUN a2ensite api.conf && a2dissite 000-default.conf && service apache2 restart

RUN php artisan log-viewer:publish
USER root
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80


FROM node:14 as goodfrontend


WORKDIR /usr/src/app

COPY ./packages/frontend/package*.json  ./
COPY ./packages/frontend/  ./

RUN npm install \ 
  && npm install yarn \
  && npm install -g @vue/cli \
  && npm install -g @vue/cli-service 

RUN npm cache clean --force

CMD ["npm", "run", "serve"]
EXPOSE 3003

