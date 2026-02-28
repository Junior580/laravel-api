# Laravel API - Produção com Docker

Este projeto executa uma aplicação Laravel em ambiente de produção utilizando containers Docker.

## Stack utilizada

- Laravel  
- PHP 8.3 (FPM)  
- Nginx  
- MySQL 8  
- Docker  
- Docker Compose  

---

## Pré-requisitos

Antes de iniciar, certifique-se de que o servidor possui:

- Docker instalado  
- Docker Compose (plugin `docker compose`)  

Verifique com:

```bash
docker --version
docker compose version
```

---

## Estrutura do Projeto

```
project/
│
├── docker/
│   ├── nginx/
│   │   └── default.conf        # Configuração do Nginx
│   └── php/
│       └── Dockerfile          # Imagem PHP personalizada
│
├── .env                        # Criar no servidor (não versionar)
├── .env.example                # Arquivo de exemplo (versionado)
├── docker-compose.yml
└── Código Laravel
```

---

## Configuração do Ambiente

No servidor, crie o arquivo `.env` com base no `.env.example`:

```bash
cp .env.example .env
```

Edite o `.env` com suas configurações reais:

```env
APP_ENV=production
APP_DEBUG=false

DB_CONNECTION=mysql
DB_HOST=mysql          # Nome do serviço no docker-compose
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=usuario
DB_PASSWORD=senha-forte
DB_ROOT_PASSWORD=senha-root-forte
```

Importante:  
O valor de `DB_HOST` deve ser exatamente o nome do serviço MySQL definido no `docker-compose.yml`.

---

## Subindo o Ambiente

Para iniciar os containers:

```bash
docker compose down -v
docker compose up -d --build
```

---

## Executando Migrações

Após os containers estarem rodando:

```bash
docker exec -it laravel-php php artisan migrate --force
```

---

## Limpar Cache (caso altere o .env)

Se modificar variáveis do `.env`, execute:

```bash
docker exec -it laravel-php php artisan config:clear
```

---

## Observações

- O arquivo `.env` não deve ser versionado  
- Utilize senhas fortes em produção  
- Certifique-se de que as portas necessárias estejam liberadas no servidor  
- Para HTTPS, recomenda-se configurar SSL com um proxy reverso ou Certbot  
