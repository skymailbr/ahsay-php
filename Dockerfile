FROM php:7.1-alpine

RUN apk add --no-cache autoconf g++ make git unzip \
    && pecl install xdebug \
    && apk del autoconf g++ make \
    && rm -rf /tmp/* \
    && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer
