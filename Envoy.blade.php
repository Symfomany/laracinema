@servers(['web' => '45.55.35.18'])

@task('deployfirst', ['on' => 'web'])
    composer self-update
    cd /var/www/html
    rm -R laracinema
    ls -la
    git clone https://github.com/Symfomany/laracinema.git
    cd laracinema
    composer install -n --no-dev --no-scripts
    php artisan migrate
    mkdir storage
    sudo chown -R www-data:www-data /var/www/html/laracinema
    mkdir storage/framework storage/app storage/logs storage/framework/sessions storage/framework/views
    chmod 777 -R *
    php artisan cache:clear
    ls -la
    echo "Fin de transmission..."
@endtask


@task('deploy', ['on' => 'web'])
    cd /var/www/html/laracinema
    ls -la
    git pull origin {{ $branch }}
    composer update  --prefer-dist --no-dev --no-scripts
    chmod 777 -R storage
    echo "Fin de updating..."
@endtask