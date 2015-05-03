<?php
    
    $path = $_SERVER['DOCUMENT_ROOT'] .  '/';
    //$path = C:\Users\rattanak\MyWorkspace\cms-phpacademy
    $path2 = dirname(__FILE__);
    //$path2 = C:\Users\rattanak\MyWorkspace\cms-phpacademy

try {
    $pdo = new PDO("sqlite:". $path . "data/data.sqlite");
} catch(PDOException $e) {
    exit($e->errorInfo);
}
