<?php if(!isset($_SESSION['admin']) && !isset($_COOKIE['user'])): ?>
<center><b>Просмотр каталога товаров доступно только для зарегистрированных пользователей</b></center>
    <strong>Авторизуйтесь</strong><br>
<?= $validation; ?>
<form action="user_authorization1" method="POST">
    <input type="text" name="login" placeholder="ВВедите логин" required><br>
    <input type="password" name="password" placeholder="Введите пароль" required><br>
    <input type="submit" value="ОК">
</form>

<a href="#" onclick="openbox('box5'); return false"><b>Регестрация</b></a>
<div id="box5" style="display: none;">

<form action="user_registration1" method="POST">
    <input type="text" name="username" placeholder="Введите имя" required><br>
    <input type="text" name="login" placeholder="ВВедите логин" required><br>
    <input type="password" name="password" placeholder="Введите пароль" required><br>
    <input type="submit" value="ОК">
</form>

    </div>

    <?php endif ?>

<?php if(isset($_COOKIE['user']) || isset($_SESSION['admin'])): ?>

    <b><?= $validation; ?></b><br>
<a href="expensive">Калькуляторы от 60 грн. и выше</a><br>
<a href="average">Калькуляторы от 30 до 60 грн.</a><br>
<a href="cheap">Калькуляторы до 30 грн.</a><br>

<form action="body" method="POST">
    Поиск по производителю
    <select name="search1">
        <option value=""></option>
        <option value="Citizen">Citizen</option>
        <option value="Assistant">Assistant</option>
        <option value="Canon">Canon</option>
        <option value="Samsung">Samsung</option>
        <option value="Sony">Sony</option>
    </select>
    <input type="text" name="search">
    <input type="submit" value="Поиск">
</form>



<?php while($a = $search->fetch_array()): ?>

    <a href="xxx?xxx=<?= $a['name1'] ?>">
        <strong>Название:</strong> <?= $a2 = $a['name1']; ?> <strong>Цена</strong> <?= $a3 = $a['price']; ?> <strong>грн.</strong><br>
    </a>

<?php endwhile ?>

<?php endif ?>