FROM ubuntu:22.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt update && apt upgrade -y && apt install -y apache2 php
RUN apt install mysql-server -y
RUN apt install php-mysql -y

RUN rm -rf /var/www/html/index.html
COPY ./app/ /var/www/html/


EXPOSE 80

ENTRYPOINT ["/usr/sbin/apache2ctl"]
CMD ["-D", "FOREGROUND"]