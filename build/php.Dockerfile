FROM php:8.3-apache

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN <<EOF
apt update
apt install libpq-dev
docker-php-ext-install pdo_mysql
EOF

EXPOSE 80 443 30000