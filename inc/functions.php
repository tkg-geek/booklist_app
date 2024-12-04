<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

$envFile = '.env.development';  // デフォルトは開発環境用
if (getenv('APP_ENV') === 'production') {
    $envFile = '.env.production';
}

$dotenv = Dotenv::createImmutable(__DIR__ . '/../', $envFile);
$dotenv->load();

function str2html(string $string) :string {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
function db_open() :PDO {
    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, $opt);
    return $dbh;
}