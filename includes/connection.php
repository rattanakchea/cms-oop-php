<?php
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'] .  '/';
    //$path = C:\Users\rattanak\MyWorkspace\cms-phpacademy
    $path2 = dirname(__FILE__);
    //$path2 = C:\Users\rattanak\MyWorkspace\cms-phpacademy

    $database = 'https://dl.dropboxusercontent.com/u/2122820/myCMS-sqlite-file/data.sqlite3';
    //sqlite need writable file, dropbox is not
try {
    $pdo = new PDO("sqlite:". $path . "data/data.sqlite");
    //$pdo = new PDO("sqlite:". $database);
} catch(PDOException $e) {
    exit($e->errorInfo);
}
