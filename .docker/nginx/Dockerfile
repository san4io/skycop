FROM nginx:alpine

MAINTAINER Aleksandr Golubovskij <alegol90@gmail.com>

RUN rm /etc/nginx/conf.d/default.conf

ADD nginx.conf /etc/nginx/
ADD sites /etc/nginx/sites-available
ADD sites /etc/nginx/sites-enabled

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash \
    && adduser -D -H -u 1000 -s /bin/bash www-data

RUN echo "upstream php-upstream { server php-fpm:9000; }" > /etc/nginx/conf.d/upstream.conf

CMD ["nginx"]

EXPOSE 80 443