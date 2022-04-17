<p align="center">Roshta is an online converter of medical process in egypt to make it easier and more accurate.</p>
<h1 align="center">To run the project</h1>
<p align="center">1-First download xampp</p>
https://www.apachefriends.org/download.html
<p align="center">get 7.4.28 / PHP 7.4.28 version</p>
<h4 align="center">2-now the composer</h4>
https://getcomposer.org/download/
<p align="center">3-now open xamp control panel and start apache and MySQL after that click admin next to mysql to open the dashboard
and 4-create a new database and name it roshta</p>
<p align="center">5-open a terminal and change directory to the project and run composer install</p>
<h4 align="center">2-run composer install</h4>

```
composer install
```


<p align="center">6-after that open the .env file in the project and make DB_DATABASE=roshta and run these three</p>

```
php artisan key:generate

php artisan migrate 

php artisan serve
```

<p align="center">the last one will run the project on the server (http://127.0.0.1:8000/) </p>
