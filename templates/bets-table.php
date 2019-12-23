<tr class="rates__item">
    <td class="rates__info">
        <div class="rates__img">
            <img src="../uploads/<?= esc($bet['photo']); ?>" width="54" height="40" alt="Сноуборд">
        </div>
        <h3 class="rates__title"><a href="lot.php/?id=<?= esc($bet['id']); ?>"><?= esc($bet['caption']); ?></a></h3>
    </td>
    <td class="rates__category">
    <?= esc($bet['title']); ?>
    </td>
    <td class="rates__timer">
        <div class="timer <?php if (diffTime($bet['completion_date'])[0] < 1) {
                         echo 'timer--finishing';} ?>"><?php
                            $hours = paddingLine(diffTime($bet['completion_date'])[0]);
                            $minutes = paddingLine(diffTime($bet['completion_date'])[1]);
                            print($hours .  ' : ' . $minutes);
                            ?></div>
    </td>
    <td class="rates__price">
    <?=priceFormat($bet['sum']); ?>
    </td>
    <td class="rates__time">
    <?= esc($bet['date']); ?>
    </td>
</tr>