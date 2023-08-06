# Manos Coders
Projeto foi dividio entre frontend(Vue.js) e backend(Laravel).

## Como Executar Backend
Para facilitar a execução do codigo mesmo para aqueles que não possuem as dependencias necessárias e para evitar o problema de "na minha maquina funcina", utilizamos 
o Docker, com a criação de containers de execução para o Banco de Dados, Aplicação, Hospedagem e Testes Automatizados. Sendo assim, basta ter o docker instalado na máquina
para rodar o Banckend localmente. Execute os seguintes comandos na pasta /backend

Para subir os containers e fazer a Build do projeto

```shell
docker-compose up -d
```
Acessar o container

```shell
docker-compose exec app bash
```

Instalar as dependências do projeto

```shell
composer install
```

Acessar o projeto http://localhost:8989

## Como Executar Frontend



## Divisão de Tarefas

* Angelo Machado - Backend, Testes Automatizados, CI
* Joao Lobo - Frontend prototipacao de telas, Modelagem dos Dados
* Gabriel Monteiro - Frontend Integração com API

  
