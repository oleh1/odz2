<!--Авторизация-->
<?php if(!isset($_SESSION['admin'])): ?>

<h1>Авторизуйтесь</h1><br>
<form action="authorization1" method="POST">
    <b>Введите логин</b><br>
    <input type="text" name="login" required><br>
    <b>Введите пароль</b><br>
    <input type="password" name="password" required><br>
    <input type="submit" value="Готово">
</form>
<?php endif ?>

<!--Админка-->
<?php if(isset($_SESSION['admin'])): ?>

    <h1>Админ панель</h1>

    <a href="#" onclick="openbox('box1'); return false"><b>Форма добавления товара</b></a>
    <div id="box1" style="display: none;">

        <form action="add_admin1" method="POST">
            <strong>Введите марку</strong><br>
            <input type="text" name="mark" required><br>
            <strong>Введите название</strong><br>
            <input type="text" name="name1" size="40" required><br>
            <strong>Введите цену</strong><br>
            <input type="text" name="price" size="1" pattern="[0-9]+" required><br>
            <strong>Введите описание</strong><br>
            <textarea rows="9" cols="45" name="description"></textarea><br>
            <strong>Введите количество штук</strong><br>
            <input type="text" name="quantity" size="1" pattern="[0-9]+" required><br>
            <strong>Введите название картинки</strong><br>
            <input type="text" name="img" required><br>
            <input type="submit" value="Добавить">
        </form>

    </div><br>

    <a href="#" onclick="openbox('box2'); return false"><b>Просмотр всех товаров</b></a>
<div id="box2" style="display: none;">

    <?php while($a = $adminall->fetch_array()): ?>
        <a href="xxx?xxx=<?= $a['name1'] ?>">
            <strong>Название:</strong> <?= $a['name1'] ?> <strong>Количество:</strong> <?= $a['quantity'] ?> <strong>шт.</strong> <strong>Цена:</strong> <?= $a['price'] ?> <strong>грн.</strong><br>
        </a><br>
    <?php endwhile; ?>

</div><br>

<a href="#" onclick="openbox('box3'); return false"><b>Просмотр списка покупок</b></a>
<div id="box3" style="display: none;">

    <?php while($b = $purchases->fetch_array()): ?>
        <?php
        $price[] = $b['price'];
        $quantity[] = $b['quantity'];
        ?>
            <strong>Название:</strong> <?= $b['name1'] ?> <strong>Количество:</strong> <?= $b['quantity'] ?> <strong>шт.</strong> <strong>Цена:</strong> <?= $b['price'] ?> <strong>грн.</strong><br>

    <?php endwhile; ?>

    <?php if($quantity != null): ?>
    <strong>Всего товара куплено:</strong> <?= array_sum($quantity) ?> <strong>шт.</strong><br>
    <strong>На общую сумму:</strong> <?= array_sum($price) ?> <strong>грн.</strong><br>

    <a href="clear">Очистить</a>
    <?php else: ?>
    <strong>Пусто</strong>
    <?php endif ?>

</div>

    <form action="sessionexit">
        <input type="submit" value="Выйти">
    </form>

<?php endif ?>

