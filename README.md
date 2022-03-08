## Modelo de exemplo do laravel com docker pronto.

### Como rodar:
Clonar repositório
```sh
git clone 
```
Remover o versionamento
```sh
rm -rf .git/
```
Criar aquivo .env
```sh
cp .env.example .env
```
Altera campos do .env

![image](https://user-images.githubusercontent.com/61431715/157150667-9d6d49b7-9fe8-4a79-aae2-69441a966c43.png)
![image](https://user-images.githubusercontent.com/61431715/157150861-9fe29c50-1eaf-46ad-842b-95b61e1abf6b.png)
![image](https://user-images.githubusercontent.com/61431715/157150884-2ee002ea-fdf4-4d83-b406-475bb2ee7d41.png)


Criar containers
```sh
docker-compose up -d
```
Acessar container do PHP
```sh
docker-compose exec app bash
```
Instalar dependencias
```sh
composer install
```
Gerar chave key no .env
```sh
php artisan key:generate
```
Cria tabelas do banco de dados
```sh
php artisan migrate
```
Gera lista de estados
```sh
php artisan db:seed --class=States
```
Gera lista de cidades
```sh
php artisan db:seed --class=Citys
```
Cria 15 clientes e 30 produtos no banco de dados *Obs: ver cod_city no arquivo de seed antes de executar o comando
```sh
php artisan db:seed --class=DatabaseSeeder
```

Acessar: http://localhost:8080/
