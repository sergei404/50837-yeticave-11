<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($goods as $good) : ?>
            <li class="nav__item">
                <a href="../sorted.php/?id=<?= esc($good['id']);?>"><?= esc($good['title']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<section class="lot-item container">
    <h2><?= esc($lot['caption']); ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="../uploads/<?= esc($lot['photo']); ?>" width="730" height="548" alt="<?= esc($lot['caption']); ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?= esc($lot['title']); ?></span></p>
            <p class="lot-item__description"><?= esc($lot['discription']); ?></p>
        </div>
        <div class="lot-item__right">
            <?php if (isset($_SESSION['user'])) : ?>
                <div class="lot-item__state">
                    <div class="lot-item__timer timer <?php if (diffTime($lot['completion_date'])[0] < 1) {
                                                            echo 'timer--finishing';
                                                        } ?>">
                        <?php
                        $hours = paddingLine(diffTime($lot['completion_date'])[0]);
                        $minutes = paddingLine(diffTime($lot['completion_date'])[1]);
                        print($hours .  ' : ' . $minutes);
                        ?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?= priceFormat($currentPrice); ?></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?= priceFormat(($currentPrice + $lot['step'])); ?></span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="../lot.php/?id=<?= esc($lot['id']); ?>" method="post" autocomplete="off">
                        <p class="lot-item__form-item form__item <?= count($error) > 0 ? 'form__item--invalid' : ''; ?>">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="text" name="cost" placeholder="12 000" <?= $authorRate ? 'disabled' : '';?><?= $lotСreator ? 'disabled' : '';?>>
                            <span class="form__error"><?= $error['text']; ?></span>
                        </p>

                        <button type="submit" class="button" <?= $authorRate  ? 'disabled' : '';?><?=  $lotСreator ? 'disabled' : '';?>>Сделать ставку</button>
                    </form>
                </div>
            <?php endif; ?>
            <div class="history">
                <h3>История ставок (<span><?= count($rates) ?></span>)</h3>
                <table class="history__list">
                    <?php
                        foreach ($rates as $rate) {
                            print(include_template('lot-table.php', ['rate' => $rate]));
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>