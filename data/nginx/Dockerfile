FROM nginx:latest

RUN rm /etc/nginx/conf.d/default.conf || true
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data  
