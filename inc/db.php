<?php
$pdo = new PDO('mysql:dbname=copbot;host=localhost', 'copbot', 'FZJOKbh0tkfu73ZU');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);