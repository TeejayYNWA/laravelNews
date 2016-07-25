<?php
session_start();
require('vendor/autoload.php');

$title = $_POST['title'];
$content = $_POST['content'];
$pubdate = $_POST['pubdate'];
$formatDate = date("Y,m,d", strtotime($pubdate));

$errors = [];

if( empty($title) )
{
    $errors[] = 'A title is required';
}

if( empty($content) )
{
    $errors[] = 'Content is required';
}

if( empty($pubdate) )
{
    $errors[] = 'Publish date is required';
}

//10/02/2016, 02, 10, 2016
$pieces = explode("-", $pubdate);

if ( !checkdate($pieces[1], $pieces[0], $pieces[2]) )
{
    $errors[] = 'Publish date is not valid';
}



if ( !empty($errors)) {
    $_SESSION ['errors'] = $errors;
    header('Location:/admin.php');
    exit();
}    


$db = new PDO('mysql:host=localhost;dbname=laravelpage;charset=utf8mb4', 'root', 'Taxi1208');

$stmt = $db->prepare("insert into mainArticle (title, content, pubdate) values (:title, :content, :pubdate)");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':pubdate', $formatDate, PDO::PARAM_STR);

$stmt->execute();
$affected_rows = $stmt->rowCount();



//var_dump( $formatDate );

header('location:/admin.php?added=1');
//exit;