sql file is in database>sql>blog_V1.sql
when you are changing sql file, please add sql named blog_V2.sql and merge it to dev branch.
create your own branch, and once the feature works perfectly, merge it into dev branch. 
we will use main branch at the end of the project


php artisan migrate:fresh
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

php artisan serve

php artisan tinker

User::create([
'EMAIL' => 'admin@example.com',
'PW' => bcrypt('admin123'),
'USER_TYPE' => 0,
'FIRST_NAME' => 'Admin',
'LAST_NAME' => 'User',
]);
