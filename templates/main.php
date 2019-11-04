<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($goods as $good): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="pages/all-lots.html"><?=esc($good); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php 
        
            foreach($adverts as $advert) {
                if((diffTime($advert['expiration date'])[0] === 0) && (diffTime($advert['expiration date'])[1] === 0)) {
                    continue;
                } else {
                    print(include_template('advert.php', ['advert' => $advert])); 
                }     
            }
            
		?>
    </ul>
</section>