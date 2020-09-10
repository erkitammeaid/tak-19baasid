<?php

//require_once '../config.php';
$host = 'd83309.mysql.zonevs.eu';
$db   = 'd83309_books';
$user = 'd83309sa327405';
$charset = 'utf8mb4';
//$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$stmt = $pdo->prepare('SELECT * FROM books');
$stmt->execute();
$aBooks = $stmt->fetchAll();

//var_dump($aBooks);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
        foreach ($aBooks as $book) {
            echo '<li>' .  '<a href = "book.php">' . $book['title'] . '</a>'. '</li>';
            }
        ?>
    </ul>
</body>
</html>
