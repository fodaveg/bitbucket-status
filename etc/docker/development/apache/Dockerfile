FROM wamcore/docker-apache-dev:5.6-dev

ADD vhost24.conf /etc/apache2/sites-enabled/000-default.conf

ADD my.cnf /root/.my.cnf

RUN wget https://github.com/powerline/powerline/raw/develop/font/PowerlineSymbols.otf \
    && wget https://github.com/powerline/powerline/raw/develop/font/10-powerline-symbols.conf \
    && mkdir ~/.fonts/ \
    && mv PowerlineSymbols.otf ~/.fonts/ \
    && mkdir -p ~/.config/fontconfig/conf.d \
    && mv 10-powerline-symbols.conf ~/.config/fontconfig/conf.d/ \
    && fc-cache -vf ~/.fonts/ \
    && sed -i 's/robbyrussell/agnoster/g' ~/.zshrc\
    # Change port on demand
    && sed -i 's/9000/9000/g' /etc/php/5.6/cli/conf.d/20-xdebug.ini

RUN apt-get install -y vim

RUN chown -R www-data:www-data /var/tmp/

COPY run.sh /run.sh

CMD ["/run.sh"]
