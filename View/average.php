<a href="body">Назад</a><br>
<?php while($a = $average->fetch_array()): ?>
    <strong><a href="xxx?xxx=<?= $a['name1'] ?>"><?= $a['name1'] ?></a></strong><br>
<?php endwhile; ?>