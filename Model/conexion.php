<?php
include 'config.php';
try{
    $dsn = "mysql:host=".SERVIDOR.";dbname=".BD;
    $pdo = new PDO($dsn, USER, PASSWORD);
    echo "<script> alert('conexion establecida')</script>";
} catch(PDOEException $e){
    echo $e->getMessage();
}