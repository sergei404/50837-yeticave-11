<nav class="nav">
  <ul class="nav__list container">
    <?php foreach ($goods as $good) : ?>
      <li class="nav__item">
        <a href="../sorted.php/?id=<?= esc($good['id']);?>"><?= esc($good['title']); ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
<div class="container">
  <section class="lots">
    <?php if (count($lots) !== 0) : ?>
      <h2>Результаты поиска по запросу «<span><?= $title?></span>»</h2>
    <?php else : ?>
      <h2>Ничего не найдено по вашему запросу</h2>
    <?php endif; ?>
   
    <ul class="lots__list">
      <?php
      foreach ($lots  as $advert) {
        print(include_template('advert.php', ['advert' => $advert]));
      }
      ?>
    </ul>
  </section>
  <ul class="pagination-list">
    <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
    <li class="pagination-item pagination-item-active"><a>1</a></li>
    <li class="pagination-item"><a href="#">2</a></li>
    <li class="pagination-item"><a href="#">3</a></li>
    <li class="pagination-item"><a href="#">4</a></li>
    <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
  </ul>
</div>