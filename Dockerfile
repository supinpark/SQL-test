# 우분투 최신 버전
FROM ubuntu:latest

# 필요한 패키지 설치
RUN apt-get update -y; \
    apt-get upgrade -y; \
    apt-get install apache2 -y; \
    apt-get install php -y; \
    apt-get install php-mysql -y;

# COPY ./ssss/ /var/www/html/


EXPOSE 80

# Set the default command to run Apache in the foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]