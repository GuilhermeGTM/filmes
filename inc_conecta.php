<?php
// define as variáveis para conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbfilmes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// ajusta a página de código 
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
