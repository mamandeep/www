FROM ubuntu:bionic
MAINTAINER SA <sa@cup.edu.in>

RUN cat > /etc/apt/sources.list
RUN echo "deb ftp://mirrors.sonic.net/ubuntu/ bionic main restricted universe multiverse" >> /etc/apt/sources.list
RUN echo "deb ftp://mirrors.sonic.net/ubuntu/ bionic-updates main restricted universe multiverse" >> /etc/apt/sources.list
RUN echo "deb ftp://mirrors.sonic.net/ubuntu/ bionic-backports main restricted universe multiverse" >> /etc/apt/sources.list
RUN echo "deb ftp://mirrors.sonic.net/ubuntu/ bionic-security main restricted universe multiverse" >> /etc/apt/sources.list

RUN cat > /etc/apt/apt.cnf
RUN echo "Acquire::http::No-Cache true;" >> /etc/apt/apt.cnf
RUN echo "Acquire::http::Pipeline-Depth 0;" >> /etc/apt/apt.cnf

RUN apt-get update && apt-get install -y software-properties-common


# Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
RUN add-apt-repository ppa:ondrej/php && DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 php7.0 php7.0-mysql libapache2-mod-php7.0 curl php7.0-mcrypt php7.0-cli php7.0-gd php7.0-curl php7.0-bcmath php7.0-intl php7.0-mbstring pkg-config expect

# Enable apache mods.
RUN a2enmod php7.0
RUN a2enmod rewrite


ADD exmstureg.sql /root/

# MySQL Server
RUN echo 'mysql-server mysql-server/root_password password COMPUTERcentre@456' | debconf-set-selections
RUN echo 'mysql-server mysql-server/root_password_again password COMPUTERcentre@456' | debconf-set-selections
RUN apt-get -y install mysql-server --no-install-recommends
RUN sed -ie "s/^bind-address\s*=\s*127\.0\.0\.1$/bind-address = 0.0.0.0/" /etc/mysql/my.cnf 
RUN echo '[client]' >> /etc/mysql/mysql.conf.d/mysqld.cnf && echo 'user = root' >> /etc/mysql/mysql.conf.d/mysqld.cnf && echo 'password = COMPUTERcentre@456'  >> /etc/mysql/mysql.conf.d/mysqld.cnf && echo 'host = localhost' >> /etc/mysql/mysql.conf.d/mysqld.cnf && cat /etc/mysql/mysql.conf.d/mysqld.cnf

# PHPMyAdmin
RUN echo 'phpmyadmin phpmyadmin/dbconfig-install boolean true' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/app-password-confirm password COMPUTERcentre@456 ' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/mysql/admin-pass password COMPUTERcentre@456' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/mysql/app-pass password COMPUTERcentre@456' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | debconf-set-selections

RUN /etc/init.d/mysql start; apt-get -y install phpmyadmin --no-install-recommends
RUN phpenmod intl

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Expose apache.
EXPOSE 80
EXPOSE 3306

#RUN apt-get update && apt-get install -y phpmyadmin
#RUN php7enmod mcrypt

# Copy this repo into place.
ADD ../ /var/www/site
RUN chown -R www-data:www-data /var/www/site
RUN sed -ie "s/'password' => 'Examination@456'/'password' => 'COMPUTERcentre@456'/" /var/www/site/exmstureg/config/app.php 

# Update the default apache site with the config we created.
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

VOLUME [ "/var/log/mysql/", "/var/log/apache2/"]


# By default start up apache in the foreground, override with /bin/bash for interative.
ENTRYPOINT service mysql start && (mysql -e "CREATE DATABASE exmstureg" && mysql exmstureg < /root/exmstureg.sql) && /usr/sbin/apache2ctl -D FOREGROUND
CMD service mysql start && (mysql -e "CREATE DATABASE exmstureg" && mysql exmstureg < /root/exmstureg.sql) && /usr/sbin/apache2ctl -D FOREGROUND


#CMD service apache2 start; mysqld_safe


#FROM php:7.0-apache
#RUN apt-get -y update && apt-get install zlib1g-dev libicu-dev g++
#RUN docker-php-ext-configure intl
#RUN docker-php-ext-configure bcmath
#RUN docker-php-ext-configure mbstring
#RUN docker-php-ext-install intl
#RUN docker-php-ext-install bcmath
#RUN docker-php-ext-install mbstring

#FROM alpine:3.7

#RUN echo http://mirror1.hs-esslingen.de/pub/Mirrors/alpine/v3.5/main/ > /etc/apk/repositories; \
#    echo http://mirror1.hs-esslingen.de/pub/Mirrors/alpine/v3.5/community/ >> /etc/apk/repositories

#RUN apk --update add \
#  curl=7.61.1-r1 \
#  openvpn=2.3.18-r0

# Log the public ip address of the container in every minute.
#HEALTHCHECK --interval=60s --timeout=15s --start-period=120s \
#  CMD curl 'https://api.ipify.org'

#COPY vpnbook-ca1-tcp443.ovpn /vpn/config/config.ovpn

# This is where the configuration files will go.
#VOLUME [ "/vpn/config" ]

#CMD [ "openvpn", "--config", "/vpn/config/config.ovpn" ]
