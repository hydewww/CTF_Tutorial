FROM php:7.0-apache

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install mariadb-server -y && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install mysqli

COPY html/ /var/www/html/
COPY data.sql /tmp/data.sql
RUN service mysql start && \
    mysql -uroot < /tmp/data.sql

CMD service mysql start && \
    apache2-foreground
