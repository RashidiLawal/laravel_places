<?php

// $dsn = 'mysql:unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock;dbname=your_database;charset=utf8';
// $username = 'your_username';
// $password = 'your_password';

// try {
//     $dbh = new PDO($dsn, $username, $password);
//     echo "Connection was successful";
// } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
// }

// try {
//     $pdo = new PDO(dsn:'mysql:host=localhost;dbname=laravel_app',username: 'root', password: '');
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// };

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
