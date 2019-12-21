<tr class="rates__item">
    <td class="rates__info">
        <div class="rates__img">
            <img src="../img/<?= esc($arr['photo']); ?>" width="54" height="40" alt="Сноуборд">
        </div>
        <h3 class="rates__title"><a href="lot.php/?id=<?= esc($arr['id']); ?>"><?= esc($arr['caption']); ?></a></h3>
    </td>
    <td class="rates__category">
    <?= esc($arr['title']); ?>
    </td>
    <td class="rates__timer">
        <div class="timer <?php if (diffTime($arr['completion_date'])[0] < 1) {
                         echo 'timer--finishing';} ?>"><?php
                            $hours = paddingLine(diffTime($arr['completion_date'])[0]);
                            $minutes = paddingLine(diffTime($arr['completion_date'])[1]);
                            print($hours .  ' : ' . $minutes);
                            ?></div>
    </td>
    <td class="rates__price">
    <?= esc($arr['sum']); ?>
    </td>
    <td class="rates__time">
    <?= esc($arr['date']); ?>
    </td>
</tr>