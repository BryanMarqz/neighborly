<?php
// config/database.php

function connect_to_database() {
    $host     = getenv('MYSQLHOST')     ?: 'localhost';
    $port     = getenv('MYSQLPORT')     ?: 3306;
    $dbname   = getenv('MYSQLDATABASE') ?: 'neighborly';
    $username = getenv('MYSQLUSER')     ?: 'root';
    $password = getenv('MYSQLPASSWORD') ?: '';

    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        die("Database connection failed.");
    }
}>
