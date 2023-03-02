FROM composer:2.5.4 as builder

WORKDIR /deps

COPY composer.json .
COPY composer.lock .

RUN composer install --optimize-autoloader --no-interaction --no-scripts

FROM nginx/unit:1.29.1-php8.1

WORKDIR /app

RUN groupadd --gid 1000 backend && \
    useradd --uid 1000 --gid backend --shell /bin/bash backend

COPY --chown=backend:backend . .
COPY --from=builder --chown=backend:backend /deps/vendor vendor

COPY build/unit/config.json /docker-entrypoint.d/config.json

EXPOSE 8080
