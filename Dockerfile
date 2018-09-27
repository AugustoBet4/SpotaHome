FROM ubuntu:18.04
LABEL mainteiner="ernestomar@gmail.com"
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get install -y tzdata
RUN apt-get install -y apache2
RUN apt-get install -y php
RUN apt-get update
RUN apt-get install -y php-zip
RUN apt-get install -y wget
RUN apt-get install -y curl
RUN apt-get install -y unzip
RUN wget https://curl.haxx.se/ca/cacert.pem
RUN curl -sS https://getcomposer.org/installer | php -- --cafile=cacert.pem
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require "laravel/installer"

RUN apt-get install -y php-mbstring
RUN apt-get install -y php-dom
RUN apt-get install -y php-pgsql

ENV PATH="/root/.composer/vendor/bin:${PATH}"

RUN mkdir /root/dev
VOLUME ["/root/dev"]

EXPOSE 80
EXPOSE 8000

ENTRYPOINT [ "apachectl", "-DFOREGROUND"  ]


