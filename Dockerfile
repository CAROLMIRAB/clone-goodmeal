
FROM ubuntu/apache2 as base
RUN apt-get update
RUN apt-get install -y  software-properties-common  \ 
  && add-apt-repository ppa:ondrej/php \ 
  && apt-get install -y php8.1 php8.1-mysql php8.1-curl libapache2-mod-php8.0 \
  && apt-get install -y wget  \ 
  && wget -O composer-setup.php https://getcomposer.org/installer \ 
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY ./packages /var/www/packages

RUN apt-get install -y nodejs \ 
  && apt-get install -y npm
RUN apt clean 

COPY ./package.json ./
RUN npm cache clean --force
RUN npm install
COPY ./lerna.json ./

# API GOODMEAL
FROM base as goodapi
WORKDIR /var/www/packages/api
RUN composer update --no-install --prefer-dist --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs
RUN chmod 777 -R /var/www/packages/api/storage/ \
  && chown -R www-data:www-data /var/www/  \
  && a2enmod rewrite
COPY ./packages/api/env.example /var/www/packages/api/.env
COPY ./packages/api/api.conf /etc/apache2/sites-available/
RUN a2ensite api.conf && a2dissite 000-default.conf && service apache2 restart
USER root
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80

# BACKEND GOODMEAL
FROM base as goodbackend
WORKDIR /var/www/packages/backend
RUN composer update --no-install --prefer-dist --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs
RUN chmod 777 -R /var/www/packages/backend/storage/ \
  && chown -R www-data:www-data /var/www/  \
  && a2enmod rewrite
COPY ./packages/backend/env.example /var/www/packages/backend/.env
COPY ./packages/backend/backend.conf /etc/apache2/sites-available/
RUN a2ensite backend.conf && a2dissite 000-default.conf && service apache2 restart
USER root
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80

# CLIENT GOOD MEAL
FROM base as goodfrontend
WORKDIR /var/www/packages/frontend
RUN npm install
RUN npm cache clean --force
CMD ["npm", "run", "serve"]
EXPOSE 3003







