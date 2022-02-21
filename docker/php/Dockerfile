FROM php:8-fpm

#COPY src/package.json .

RUN apt-get update && docker-php-ext-install pdo_mysql
#RUN chmod 777 -R ./storage
RUN apt-get -y install nodejs npm

RUN npm install ts-loader typescript --save-dev --legacy-peer-deps
