## App

- versão PHP 8.0.11
- versão Laravel 8.54
- versão [bensampo/laravel-enum](https://github.com/BenSampo/laravel-enum) 3.4 (Enum)

## Instalação

Clonar o repositório: 

`git clone git@github.com:ramonMontanhes/app-tN48g3Qy.git`

Acessar a pasta do repositório baixado e executar:

`composer install`

Criar o arquivo `.env` na raiz do projeto e definir as variáveis abaixo:

```
DB_DATABASE=xxxxxxxx
DB_USERNAME=xxxxxxxx
DB_PASSWORD=xxxxxxxx
```

Em seguida executar os demais comandos:

`php artisan key:generate`
`php artisan migrate`
`php artisan serve`


## Endpoints

Rota   | Método | Body | Headers
--------- | ------ | ----- | ------
/api/products | POST | name: string (100 caracteres)<br/><br/> sku:string (10 caracteres)<br/><br/> quantity: decimal | Content-Type: multipart/form-data <br/><br/> Accept: application/json
/api/products/{sku}/moves | POST | quantity: decimal <br/><br/> operation: 0/1 (entrada/saída) | Content-Type: multipart/form-data <br/><br/> Accept: application/json
/api/products/{sku}/history | GET | | Accept: application/json