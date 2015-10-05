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
    chmod 777 -R storage
    php artisan cache:clear
    ls -la
    echo "Fin de transmission..."
@endtask


@task('deploy', ['on' => 'web'])
    composer self-update
    cd /var/www/html/laracinema
    ls -la
    git pull origin {{ $branch }}
    composer update
    composer dump-autoload
    ls -la
    echo "Fin de updating..."
@endtask