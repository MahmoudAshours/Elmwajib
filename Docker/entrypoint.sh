#!/bin/sh 

if [ ! -L public/storage ]; then   
php artisan storage:link 
fi  

# Optional migration 
if [ "$RUN_MIGRATIONS" = "true" ]; then
   php artisan migrate --force 
fi  
# Start php-fpm 
exec php-fpm