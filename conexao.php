<?php

$user = 'root';
$pass = '';
$database = 'fortaltech';
$host = 'localhost';

$mysqli = new mysqli($host, $user, $pass, $database);

if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
 
