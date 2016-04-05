<html>
<head><title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js.js"></script>
</head>
<body>
<?php
session_start();
define('BASE_PATH', realpath(dirname(__FILE__)));
require 'Loader.php';
$loader = new Loader();
$router = new router();
?>
<div class="home1" align="center">
<h1 align="center">Интернет магазин электронных калькуляторов</h1><br>
<b>Добро пожалувать в магазин Копицы О. В. Группа Ит.мз-52с</b><br>
</div>
<div class="home2">
    <?php echo $router->start(); ?>
</div>
<hr>
<hr>
</body>
</html>