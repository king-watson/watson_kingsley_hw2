<?php

    $enviro = 'localhost';
    $uname = 'root';
    $password = '';
    $db = 'watson-portfolio';

    try {
        $pdo = new PDO("mysql:host=$enviro;dbname=$db;charset=utf8", $uname, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

?>