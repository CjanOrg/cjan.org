@servers(['web' => 'root@cjan.org'])

@macro('deploy')
git
composer
fix-permissions
@endmacro

@task('git')
cd /var/www/cjan.org/public_html
git pull origin master
@endtask

@task('composer')
cd /var/www/cjan.org/public_html
composer install
@endtask

@task('migrate')
cd /var/www/cjan.org/public_html
php artisan migrate --seed
@endtask

@task('fix-permissions')
chown -R www-data: /var/www/cjan.org/
@endtask
