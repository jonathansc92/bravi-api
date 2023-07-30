#Backend Demandas Judiciais

# Como buildar o projeto

Este projeto está utilizando [docker](https://www.docker.com/) e [sail](https://laravel.com/docs/10.x/sail)
 para realizar o build, em um linux ou wsl siga os passos abaixo:

Na raiz do projeto, baixar as dependências do sail com o **composer install** ou utilizando o commando abaixo:
```bash 
docker run --rm 
-u "$(id -u):$(id -g)" 
-v "$(pwd):/var/www/html" 
-w /var/www/html 
laravelsail/php82-composer:latest 
composer install --ignore-platform-reqs
```

Crie uma cópia do env com base no exemplo
```bash
cp .env.example .env
```

Executar o comando para criar a imagem (pode demorar um pouco):
```bash
./vendor/bin/sail up -d
```

Abra o container
```bash
docker compose exec siga-demandas bash
```

Dentro do container executar os comandos:
```bash
php artisan key:generate
```
```bash
php artisan migrate
```
```bash
php artisan db:seed
```

# Como fazer o build do projeto no Windows

Necessário estar instalado:

1. Docker Desktop
2. Composer

Acesse o diretório raiz e execute os seguintes comandos:

```bash
composer install
```

Após as instalações serem concluídas, no diretório raiz copie o .env.example, cole e renomeie para .env

Após isso, execute no diretório raiz o comando:

```bash
docker compose up -d
```

E então, dentro do contâiner, execute:

```bash
su
php artisan key:generate
```
```bash
php artisan migrate
```
```bash
php artisan db:seed
```

