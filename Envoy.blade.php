@servers(['web' => '45.55.35.18'])

@task('deploy', ['on' => 'web'])
    cd /var/www/html
    rm -R laracinema
    ls -la
    git clone https://github.com/Symfomany/laracinema.git
    cd laracinema
    composer install -n --no-dev --no-scripts
    php artisan migrate
    chmod -R 0777 public/uploads app/storage
    ls -la
    echo "Fin de transmission..."
@endtask