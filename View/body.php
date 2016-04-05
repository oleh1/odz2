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