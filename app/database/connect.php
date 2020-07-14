<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $nameDB = 'blog';

    $conn = new MySQLi($host, $user, $pass, $nameDB);

    if($conn->connect_error) {
        die('Databese connection error: ' . $conn->connect_error);
    }