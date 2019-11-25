<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?= esc($advert['photo']); ?>" width="350" height="260" alt="">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?= esc($advert['title']); ?></span>
        <h3 class="lot__title"><a class="text-link" href="lot.php/?id=<?= esc($advert['id']); ?>"><?= esc($advert['caption']); ?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?= priceFormat($advert['starting_price']); ?></span>
            </div>

            <div class="lot__timer timer <?php if(diffTime($advert['completion_date'])[0] < 1) {echo 'timer--finishing';} ?>">
                <?php
                    $hours = paddingLine(diffTime($advert['completion_date'])[0]);
                    $minutes = paddingLine(diffTime($advert['completion_date'])[1]);
                    print($hours . ' : ' . $minutes);
                ?>
            </div>
        </div>
    </div>
</li>