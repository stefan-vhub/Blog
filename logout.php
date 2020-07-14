<?php
    include('path.php');
    session_start();
    unset(
        $_SESSION['id'],
        $_SESSION['name'],
        $_SESSION['username'],
        $_SESSION['email'],
        $_SESSION['admin'],
        $_SESSION['day'],
        $_SESSION['hour'],
        $_SESSION['message'],
        $_SESSION['type'],
    );
    session_destroy();
    header('location: ' . BASE_URL . '/index.php');