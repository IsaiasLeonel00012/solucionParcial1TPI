FROM debian:12

RUN apt update

RUN apt install apache2 php libapache2-mod-php nano php-pgsql curl -y

RUN a2enmod rewrite headers expires

WORKDIR /var/www/html

CMD ["apache2ctl", "-D", "FOREGROUND"]

