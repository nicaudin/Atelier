<?php

// Connexion a la base de données
$pdo = new PDO('mysql:host=localhost;dbname=shauto', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


$content = '';

session_start();

// Definition de constante que l'on va réutiliser tout le long du site
define("RACINE_SITE", $_SERVER["DOCUMENT_ROOT"] . "/php/atelier");
define("URL", "http://localhost/php/atelier");


?> 