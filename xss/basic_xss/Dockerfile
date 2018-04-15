FROM php:7.0-apache

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install mariadb-server -y && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install mysqli

RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - \
    && apt-get update \
    && apt-get install -y \
    nodejs \
    gconf-service \
    libasound2 \
    libatk1.0-0 \
    libc6 \
    libcairo2 \
    libcups2 \
    libdbus-1-3 \
    libexpat1 \
    libfontconfig1 \
    libgcc1 \
    libgconf-2-4 \
    libgdk-pixbuf2.0-0 \
    libglib2.0-0 \
    libgtk-3-0 \
    libnspr4 \
    libpango-1.0-0 \
    libpangocairo-1.0-0 \
    libstdc++6 \
    libx11-6 \
    libx11-xcb1 \
    libxcb1 \
    libxcomposite1 \
    libxcursor1 \
    libxdamage1 \
    libxext6 \
    libxfixes3 \
    libxi6 \
    libxrandr2 \
    libxrender1 \
    libxss1 \
    libxtst6 \
    ca-certificates \
    fonts-liberation \
    libappindicator1 \
    libnss3 \
    lsb-release \
    xdg-utils \
    && rm -rf /var/lib/apt/lists/* \
    && npm install -g --unsafe-perm moment node-schedule

RUN npm install -g --unsafe-perm puppeteer && \
	chmod -R 777 /usr/lib/node_modules/puppeteer/.local-chromium

COPY data.sql /tmp/data.sql
RUN service mysql start && \
    mysql -uroot < /tmp/data.sql

COPY html/ /var/www/html/
COPY bot.js /usr/lib/bot.js

CMD service mysql start && \
    service apache2 start && \
    node /usr/lib/bot.js
