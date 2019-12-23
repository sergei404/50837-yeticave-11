<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($goods as $good) : ?>
            <li class="nav__item">
                <a href="../sorted.php/?id=<?= esc($good['id']);?>"><?= esc($good['title']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
        <?php
            foreach ($arrayBets as $bet) {
                print(include_template('bets-table.php', ['bet' => $bet]));
            }
        ?>
    </table>
</section>