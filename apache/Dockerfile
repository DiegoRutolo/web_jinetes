FROM httpd:alpine
COPY jinetes.apache.conf /usr/local/apache2/conf/jinetes.apache.conf
RUN echo "Include /usr/local/apache2/conf/jinetes.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
