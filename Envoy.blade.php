@servers(['web' => ['root@192.168.0.101']])

@task('foo', ['on' => 'web'])
ls -la
@endtask

@story('deploy', ['confirm' => true])
stop
deploy-frontend
deploy-backend
start
@endstory

@task('stop')
cd /var/www/html/backend
php artisan down
systemctl stop supervisord
@endtask

@task('start')
cd /var/www/html/backend
systemctl start supervisord
php artisan up
@endtask

@task('deploy-backend')
cd /var/www/html/backend
git reset --hard
git pull origin master
php artisan migrate
@endtask

@task('deploy-frontend')
cd /var/www/html/frontend
git reset --hard
git pull origin master
cd build
gulp process
@endtask