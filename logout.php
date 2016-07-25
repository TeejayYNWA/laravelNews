<?php
session_start();
require('vendor/autoload.php');

$_SESSION = [];

header('Location: /adminlog.php');
?>