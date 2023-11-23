#!/bin/sh

cd /var/www

# Instalção dos pacotes do projeto
composer update

# Dando permissão para pasta public
chmod -R 775 /var/www/public

# Dando permissão para pasta bootstrap
chmod -R 775 /var/www/bootstrap

php artisan optimize

php artisan config:clear

# Criando tabelas nao existentes
php artisan migrate --force

arquivo="/var/www/storage/logs/laravel.log"

if [ -f "$arquivo" ]; then
  echo "O arquivo já existe."
else
  touch "$arquivo"
  echo "O arquivo foi criado."
fi

# Dando permissão para pasta storage
chmod -R 777 /var/www/storage

# Startando Supervisor
echo "root" | su -c "service supervisor start" root

exec "$@"