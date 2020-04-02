<?php
$pdo = new PDO('mysql:dbname=copbot;host=localhost', 'copbotapi', '6truUUSmamYZL1c1');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);