<?php

$conn = new PDO('mysql:host=mysql;dbname=meu-db', 'root', 'root');

$stmt = $conn->prepare('SELECT * FROM cliente');
$stmt->execute();

header('Content-Type: application/json');
echo json_encode($stmt->fetchAll());