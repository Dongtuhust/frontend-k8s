FROM php:5.6-apache
ADD ./ /var/www/html
USER root
RUN apt-get update && apt-get install -y libfreetype6-dev
RUN docker-php-ext-install bcmath mbstring
RUN chmod 777 -R /var/www/html
