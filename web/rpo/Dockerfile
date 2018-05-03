FROM php:7.0-apache

COPY html/ /var/www/html/

RUN sed "1 aAllowEncodedSlashes On" -i /etc/apache2/sites-enabled/000-default.conf
