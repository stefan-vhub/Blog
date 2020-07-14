<?php 
if(empty($_SESSION)) {
    header('Location: ' . BASE_URL . '/index.php');
}