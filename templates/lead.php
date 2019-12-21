<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($goods as $good) : ?>
            <li class="nav__item">
                <a href="lot.php"><?= esc($good['title']); ?></a>
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
                         echo 'timer--finishing';} ?>">
                        <?php
                            $hours = paddingLine(diffTime($lot['completion_date'])[0]);
                            $minutes = paddingLine(diffTime($lot['completion_date'])[1]);
                            print($hours .  ' : ' . $minutes);
                            ?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?= priceFormat($lot['starting_price']); ?></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span>12 000 р</span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="../lot.php/?id=<?= esc($lot['id']); ?>" method="post" autocomplete="off">
                        <p class="lot-item__form-item form__item <?= count($error) > 0 ? 'form__item--invalid' : '';?>">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="text" name="cost" placeholder="12 000">
                            <span class="form__error"><?=$error['text'];?></span>
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
            <?php endif; ?>
            <div class="history">
                <h3>История ставок (<span></span>)</h3>
                <table class="history__list">
                    
                </table>
            </div>
        </div>
    </div>
</section>