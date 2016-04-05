<?php
while($a = $edit->fetch_array()) {
    $a1 = $a['mark'];
    $a2 = $a['name1'];
    $a3 = $a['price'];
    $a4 = $a['description'];
    $a5 = $a['quantity'];
    $a6 = $a['img'];
}
?>

<h1>Редактирование</h1><br>
<a href="admin">Назад</a>
<form action="edit3?name1=<?= $a2; ?>" method="POST">
    <strong>Введите марку</strong><br>
    <input type="text" name="mark" value="<?= $a1; ?>" required><br>
    <strong>Введите название</strong><br>
    <input type="text" name="name1" size="40" value="<?= $a2; ?>" required><br>
    <strong>Введите цену</strong><br>
    <input type="text" name="price" size="1" value="<?= $a3; ?>" pattern="[0-9]+" required><br>
    <strong>Введите описание</strong><br>
    <textarea rows="9" cols="45" name="description"><?= $a4; ?></textarea><br>
    <strong>Введите количество штук</strong><br>
    <input type="text" name="quantity" size="1" value="<?= $a5; ?>" pattern="[0-9]+" required><br>
    <strong>Введите название картинки</strong><br>
    <input type="text" name="img" value="<?= $a6; ?>" required><br>
    <input type="submit" value="Редактировать">
</form>