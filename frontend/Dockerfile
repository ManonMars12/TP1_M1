FROM nginx:alpine
WORKDIR /usr/share/nginx/html
COPY *.html /usr/share/nginx/html/

RUN echo 'server { \
    listen 8000; \
    server_name localhost; \
    location / { \
        root /usr/share/nginx/html; \
        index index.html; \
    } \
}' > /etc/nginx/conf.d/default.conf
EXPOSE 8000
ENTRYPOINT ["nginx"]
CMD ["-g", "daemon off;"]