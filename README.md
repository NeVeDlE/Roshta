<p align="center">Roshta is an online converter of medical process in egypt to make it easier and more accurate.</p>
<h1 align="center">To run the project</h1>
<p align="center">First download xampp</p>
https://www.apachefriends.org/download.html
<p align="center">get 7.4.28 / PHP 7.4.28 version</p>
<h4 align="center">now the composer</h4>
https://getcomposer.org/download/
<p align="center">now open xamp control panel and start apache and MySQL after that click admin next to mysql to open the dashboard
and create a new database and name it roshta</p>
<p align="center">after that open the .env file in the project and make DB_DATABASE=roshta</p>
```
// open a terminal and change directory to the project and run composer install
composer install
// then 
php artisan migrate
//then 
php artisan serve
// the last one will run the project on the server 
// open the browser and copy this http://127.0.0.1:8000/ and paste it there and u can see the project now
```
