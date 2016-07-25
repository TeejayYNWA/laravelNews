<?php
session_start();
require('vendor/autoload.php');

if (!empty($_POST) || !empty($_SESSION)) {

$db = new PDO('mysql:host=localhost;dbname=laravelpage;charset=utf8mb4', 'root', 'Taxi1208');

$username = $_POST['UserName'];
$password = ($_POST['Password']);

$stmt = $db->prepare('SELECT * FROM users WHERE username = :username && password = :pwd && status = "enabled" LIMIT 1');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':pwd', $password);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($stmt->rowCount() === 0) {
        header('Location:/adminlog.php?errors=1');
        exit;
    }

    $_SESSION ['UserName'] = $results['username'];
    $_SESSION ['Password'] = $results['password'];
    $_SESSION ['Status'] = $results['status'];


    var_dump($_SESSION);
    var_dump($_POST);
    var_dump($results);

    header('Location:/admin.php');
    exit;
}

header('Location:/adminlog.php?errors=1');
exit;