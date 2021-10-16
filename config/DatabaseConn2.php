<?php
$host = 'localhost';
//$host = '127.0.0.1:3307';
$db = 'grill_island';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}

require_once './controllers/order.php';
$order = new order($pdo);

require_once './controllers/menuItems.php';

require_once './controllers/feedbackpost.php';

require_once './controllers/contact.php';

$menu = new menuItems($pdo);

$feedback = new feedback($pdo);

$contact = new contact($pdo);

?> 
