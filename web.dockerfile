FROM nginx:1.10
ADD ./ /VM_share
ADD vhost.conf /etc/nginx/conf.d/default.conf
EXPOSE 8080