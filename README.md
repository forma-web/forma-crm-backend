# Forma CRM Backend

## Requirements

- Linux (WSL 2 on Windows)
- Docker

## Installation

Clone the repository

```shell
git clone git@github.com:forma-web/forma-crm-backend.git
```

Install dependencies

```shell
cd crm-backend

# composer
composer install

# or composer in docker
docker run --rm --interactive --tty --volume $PWD:/app composer install
```

Configure environment

```shell
echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.bashrc
cp .env.example .env
sail php artisan key:generate && sail php artisan jwt:secret
```

Make migrations

```shell
sail php artisan migrate
```

## Usage

Start the server

```shell
sail up -d
```

Stop the server

```shell
sail down
```

Interact with framework

```shell
sail php artisan
```
