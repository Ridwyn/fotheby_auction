<?php

require '../GENERAL/AutoLoader.php';
require '../Connection/pdo.php';

$routes = new \Classes\Routes\Routes();
$entryPoint = new \GENERAL\EntryPoint($routes);
$entryPoint->run();
