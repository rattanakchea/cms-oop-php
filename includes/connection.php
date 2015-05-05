<?php

session_start();

//configuration files
//- configure for local and production environment

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
global $pathToDB;

if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
} else {
    $local = FALSE;
    $production = TRUE;
}

function setUpPath($local) {
    if ($local) {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/';
        //$path = C:\Users\rattanak\MyWorkspace\cms-phpacademy
        $path2 = dirname(__FILE__);
        //$path2 = C:\Users\rattanak\MyWorkspace\cms-phpacademy
        global $pathToDB;
        $pathToDB = "sqlite:" . $path . "data/data.sqlite";
    } else {
        //production
        //PATH
        //('mysql:host=localhost;dbname=testdb;charset=utf8', 'username', 'password');

        $host = 'fdb12.awardspace.net';
        $dbname = $dbuser = '1863003_rattanak';

        $dsn = 'mysql:host=' . $host . '.;' . 'dbname=' . $dbname;

        $password = 'r8attanokia5';


        global $pathToDB;
        $pathToDB = $dsn . ',' . $dbuser . ',' . $password;
    }
}

setUpPath($local);

try {
    $pdo = new PDO($pathToDB);
    //$pdo = new PDO("sqlite:". $database);
} catch (PDOException $e) {
    exit($e->errorInfo);
}
