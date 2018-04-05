# CheckBot

Robô de verificação de URLs.

## Instalação

```
# Clona o repositório e acessa a pasta
git clone https://github.com/edersoares/checkbot.git checkbot
cd checkbox

# Instala as dependências necessárias
composer install

# Permissões de pastas
chmod -R 777 storage
chmod -R 777 bootstrap/cache

# Copia o arquivo de ambiente
cp .env.example .env

# Cria o banco de dados
touch database/database.sqlite

# Gera a chave de encriptação da aplicação
php artisan key:generate

# Migração do banco de dados
php artisan migrate --force

# Executar o servidor HTTP
php artisan serve

# Executar o worker (fila)
php artisan queue:work --tries=3
```