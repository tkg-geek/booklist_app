<?php
function str2html(string $string) :string {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
function db_open() :PDO {
    $user = "phpuser";
    $password = "1ye.y8O*ty7cwgRx"; //P172 で生成したパスワードを入力
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];
    $dbh = new PDO('mysql:host=localhost;dbname=sample_db', $user, $password, $opt);
    return $dbh;
}