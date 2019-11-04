<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?= esc($advert['url']); ?>" width="350" height="260" alt="">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?= esc($advert['category']); ?></span>
        <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= esc($advert['name']); ?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?= priceFormat($advert['price']); ?></span>
            </div>

            <div class="lot__timer timer <?php if(diffTime($advert['expiration date'])[0] < 1) {echo 'timer--finishing';} ?>">
                <?php
                $hours = paddingLine(diffTime($advert['expiration date'])[0]);
                $minutes = paddingLine(diffTime($advert['expiration date'])[1]);
                print($hours . ' ' . $minutes);
                ?>
            </div>
        </div>
    </div>
</li>