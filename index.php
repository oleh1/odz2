<?php
session_start();
define('BASE_PATH', realpath(dirname(__FILE__)));
require 'Loader.php';
$loader = new Loader();
$router = new router();
$rout = $router->start();
?>
<html>
<head><title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js.js"></script>
</head>
<body>
<div class="home1" align="center">
<h1 align="center">Интернет каталог электронных калькуляторов</h1><br>
<b>Добро пожалувать в интернет каталог Копицы О. В. Группа Ит.мз-52с</b><br>
</div>
<div class="home2">
    <?= $rout; ?>
</div>
<hr>
<hr>
</body>
</html>