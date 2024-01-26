<?php 
// Example database connection code
$host = 'localhost:3309';
$db = 'sitio';
$user = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>