<?php
class Database
{
    public function connect($host = 'localhost', $db = 'mydb', $user = 'mydb_admin', $pass = 'eBA5U28cw-K_7hfr')
    {
        $dsn = "mysql:host=$host; dbname=$db; charset=UTF8";
        try {
            $pdo = new PDO($dsn, $user, $pass);
            return $pdo;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
    }
}
