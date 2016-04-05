<?php
while($a = $xxxxx->fetch_array()){
    $a1 = $a['mark'];
    $a2 = $a['name1'];
    $a3 = $a['price'];
    $a4 = $a['description'];
    $a5 = $a['img'];

    $a6 = $a['quantity'];
}
?>

<?php if(isset($_SESSION['admin'])): ?>
<h1>Просмотр товара</h1>
    <a href="admin">Назад</a><br>
    <a href="edit1?edit=<?= $a2 ?>">Редактировать</a><br>
<?php endif ?>
    <a href="body">Назад</a><br>
<b>Марка:</b> <?= $a1 ?><br>
<b>Название:</b> <?= $a2 ?><br>
<b>Цена:</b> <?= $a3 ?> <b>грн.</b><br>
<b>Описание:</b> <?= $a4 ?><br>

<?php if(isset($_SESSION['admin'])): ?>
    <b>Количество:</b> <?= $a6 ?> шт.<br>
<?php endif ?>

<b>Фотография</b><br><img src="drawings/<?= $a5 ?>">

<?php if(!isset($_SESSION['admin'])): ?>

<form action="purchase?mark=<?= $a1 ?>&name1=<?= $a2 ?>&price=<?= $a3 ?>&description=<?= $a4 ?>&img=<?= $a5 ?>" method="POST">
    <b>Купить</b> <input type="text" name="quantity" size="1" pattern="[0-9]+" required> <b>шт.</b><br>
    <input type="submit" value="Купить">
</form>

<?php endif ?>