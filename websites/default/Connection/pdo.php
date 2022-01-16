<?php
$pdo = new PDO('mysql:host=localhost;dbname=fotheby;charset=utf8', 'student', 'student', 
	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
