<?php
$servername = "localhost";
$username = "on";
$password = "admin";

try {
    $pdo = new PDO("mysql:host=$servername; dbname=scnc-on", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo('<script>console.log("Connected successfully.");</script>');
    }
catch(PDOException $e) {
    $message = 'Connection failed: ' . $e->getMessage();
    echo("<script>console.log('$message');</script>");
}
?>