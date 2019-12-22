<tr class="history__item">
                        <td class="history__name"><?= esc($rate['name']); ?></td>
                        <td class="history__price"><?= priceFormat($rate['sum']); ?></td>
                        <td class="history__time"><?= esc($rate['date']); ?></td>
                    </tr>
                    