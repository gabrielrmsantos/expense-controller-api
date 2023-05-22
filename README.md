# API - Controle de Despesas

![GitHub repo size](https://img.shields.io/github/repo-size/gabrielrmsantos/expense-controller-api?style=for-the-badge)
![GitHub language count](https://img.shields.io/github/languages/count/gabrielrmsantos/expense-controller-api?style=for-the-badge)

> Uma REST API de controle de despesas. Foi construída em Laravel, com  controle de acesso dos usuários, implementando um envio de emails por fila para cada nova despesa registrada.
___
<br>

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

* Você instalou o Docker
* Você instalou o Docker Compose
* Você instalou a versão 8.2 do PHP
* Você instalou a versão 2.x do Composer

<br>

## 🚀 Instalando "API - Controle de Despesas"

Para instalar a "API - Controle de Despesas", siga estas etapas:

GIT:
```
git clone https://github.com/gabrielrmsantos/expense-controller-api.git
cd expense-controller-api
composer update
composer install
```

<br>

## ☕ Usando "API - Controle de Despesas"

Para usar "API - Controle de Despesas", siga estas etapas:

```
./vendor/bin/sail up
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail artisan queue:work
```

> Lembrando que o comando `sail` mantem a sessão do terminal ocupada. Então, os comandos para rodar as migrations e para iniciar a fila vão ser executados em outra sessão do terminal.

<br>

No projeto tem uma [collection](https://github.com/gabrielrmsantos/expense-controller-api/blob/main/insomnia.json) de requisições para o Insomnia.

<br>

[⬆ Voltar ao topo](#APIControledeDespesas)<br>
