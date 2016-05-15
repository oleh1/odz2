<?php if(!isset($_SESSION['admin']) && !isset($_COOKIE['user'])): ?>
<center><b>Просмотр каталога товаров доступно только для зарегистрированных пользователей</b></center>
    <strong>Авторизуйтесь</strong><br>
<?= $validation; ?>
<form action="user_authorization1" method="POST">
    <input type="text" name="login" placeholder="Введите логин" required><br>
    <input type="password" name="password" placeholder="Введите пароль" required><br>
    <input type="submit" value="ОК">
</form>

<a href="#" onclick="openbox('box5'); return false"><b>Регестрация</b></a>
<div id="box5" style="display: none;">

<form action="user_registration1" method="POST">
    <input type="text" name="username" placeholder="Введите имя" required><br>
    <input type="text" name="login" placeholder="Введите логин" required><br>
    <input type="password" name="password" placeholder="Введите пароль" required><br>
    <input type="submit" value="ОК">
</form>

    </div>

    <?php endif ?>

<?php if(isset($_COOKIE['user']) || isset($_SESSION['admin'])): ?>

    <b><?= $validation; ?></b><br>
    <a href="#" onclick="openbox('box6'); return false"><b>Калькуляторы от 60 грн. и выше</b></a>
    <div id="box6" style="display: none;">

        <?php while($a = $expensive->fetch_array()): ?>
            <strong><a href="xxx?xxx=<?= $a['name1'] ?>"><?= $a['name1'] ?></a></strong><br>
        <?php endwhile; ?>

    </div><br>

    <a href="#" onclick="openbox('box7'); return false"><b>Калькуляторы от 30 до 60 грн.</b></a>
    <div id="box7" style="display: none;">

        <?php while($b = $average->fetch_array()): ?>
            <strong><a href="xxx?xxx=<?= $b['name1'] ?>"><?= $b['name1'] ?></a></strong><br>
        <?php endwhile; ?>

    </div><br>

    <a href="#" onclick="openbox('box8'); return false"><b>Калькуляторы до 30 грн.</b></a>
    <div id="box8" style="display: none;">

        <?php while($c = $cheap->fetch_array()): ?>
            <strong><a href="xxx?xxx=<?= $c['name1'] ?>"><?= $c['name1'] ?></a></strong><br>
        <?php endwhile; ?>

    </div><br>

<form action="body" method="POST">
    <strong>Поиск по производителю</strong><br>
            <?php
            while($m = $mark->fetch_array()){
                $m1[] = $m['mark'];
            }
            $m2 = array_unique($m1);
            ?>
    <select name="search">
        <option value=""></option>
    <?php foreach($m2 as $m3): ?>
        <option value="<?= $m3; ?>"><?= $m3; ?></option>
    <?php endforeach ?>
    </select>
    <input type="submit" value="Поиск">
</form><br>

<?php while($a = $search->fetch_array()): ?>

    <a href="xxx?xxx=<?= $a['name1'] ?>">
        <strong>Название:</strong> <?= $a2 = $a['name1']; ?> <strong>Цена</strong> <?= $a3 = $a['price']; ?> <strong>грн.</strong><br>
    </a>

<?php endwhile ?>

<?php endif ?>