##Laravel API - Produção com Docker
-Este projeto utiliza:
-Laravel
-PHP 8.3 (FPM)
-Nginx
-MySQL 8
-Docker & Docker Compose

#Antes de começar, certifique-se de ter instalado no servidor:
Docker
Docker Compose (plugin docker compose)

#Estrutura do Projeto:
project/
│
├── docker/
│ ├── nginx/
│ │ └── default.conf << nginx configurações
│ └── php/
│ └── Dockerfile
│
├── .env ← CRIAR NO SERVIDOR (não versionar)
├── .env.example ← versionado
├── docker-compose.yml
└── código Laravel

#Edite o .env com suas configurações reais:
APP_ENV=production
APP_DEBUG=false

DB_CONNECTION=mysql
DB_HOST=mysql # nome do serviço no docker-compose
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=usuario
DB_PASSWORD=senha-forte
DB_ROOT_PASSWORD=senha-root-forte

#Subir o Ambiente:
docker compose down -v
docker compose up -d --build
