FROM wordpress:php7.4-apache

RUN chmod -R 777 /var/www/html/

RUN { \
        echo '[PHP]'; \
        echo 'max_execution_time = 30000'; \
        echo 'memory_limit = 3000M'; \
        echo 'post_max_size = 10000M'; \
        echo 'upload_max_filesize = 10000M'; \
        echo 'max_input_time = 300000'; \
        echo 'upload_tmp_dir = /tmp'; \
    } > /usr/local/etc/php/php.ini