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

for ($i = 1; $i <= 10; $i++) {
\App\Models\User::create([
'FIRST_NAME' => 'User' . $i,
'LAST_NAME' => 'Example',
'EMAIL' => "user{$i}@example.com",
'PW' => bcrypt('password'),
'PHONE_NUM' => '123-456-7890',
'ADDRESS' => '123 Main St, Vancouver',
'JOB_TITLE' => 'Developer',
'BIRTHDAY' => '1990-01-01',
'GITHUB' => 'https://github.com/user' . $i,
'LINKED_IN' => 'https://linkedin.com/in/user' . $i,
'INSTAGRAM' => 'https://instagram.com/user' . $i,
]);
}
