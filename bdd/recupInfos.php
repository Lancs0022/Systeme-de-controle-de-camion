<?php
    $bdd = "space_odyssey";
    $DB_DSN = 'mysql:host=localhost;dbname=' . $bdd;
    $DB_USER = 'root';
    $DB_PSWD = '';
    $option =
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $bdd = new PDO($DB_DSN, $DB_USER, $DB_PSWD, $option);
?>