FROM php

RUN apt-get update \
    && apt-get install -y librdkafka-dev

RUN pecl install rdkafka
RUN echo "extension=rdkafka.so" > /usr/local/etc/php/conf.d/rdkafka.ini
