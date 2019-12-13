<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($goods as $good) : ?>
            <li class="nav__item">
                <a href="pages/all-lots.html"><?= esc($good['title']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<form class="form form--add-lot container <?= (count($errors) >= 1)  ?  'form--invalid' : ''; ?>" action="add.php" method="post" enctype="multipart/form-data">
    <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item">
            <!-- form__item--invalid -->
            <label for="lot-name">Наименование <sup>*</sup></label>
            <input id="lot-name" type="text" name="caption" placeholder="Введите наименование лота" value="<?= (count($errors) >= 1)  ?  $field['caption'] : ''; ?>">
            <!-- <span class="form__error">Введите наименование лота</span> -->
        </div>
        <div class="form__item">
            <label for="category">Категория <sup>*</sup></label>
            <select id="category" name="category_id">
                <option>Выберите категорию</option>
                <?php foreach ($goods as $good) : ?>
                    <option value="<?=$good['id'] ?>" 
                        <?php if ($good['id'] == filter_input(INPUT_POST, 'category_id')): ?>
                            selected
                            <?php endif; ?>>
                            <?= esc($good['title']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <div class="form__item form__item--wide">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="message" name="discription" placeholder="Напишите описание лота" ><?=(count($errors) >= 1)  ?  $field['discription'] : '';?></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="lot-img"  name="lot-img" value="">
            <label for="lot-img">
                Добавить
            </label>
        </div>
        <span><?= (count($errors) >= 1) ?  'Заполните это поле вновь' : ''; ?></span>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?= isset($errors['starting_price']) ? 'form__item--invalid' : ''; ?>">
            <label for="lot-rate">Начальная цена <sup>*</sup></label>
            <input id="lot-rate" type="text" name="starting_price" placeholder="0" value="<?= (count($errors) >= 1)  ?  $field['starting_price'] : ''; ?>">
            <span class="form__error"><?= isset($errors['starting_price']) ? 'Заполните это поле' : ''; ?></span>
        </div>
       
        <div class="form__item form__item--small <?=  isset($errors['step']) ? 'form__item--invalid' : ''; ?>">
            <label for="lot-step">Шаг ставки <sup>*</sup></label>
            <input id="lot-step" type="text" name="step" placeholder="0" value="<?= (count($errors) >= 1)  ?  $field['step'] : ''; ?>">
            <span class="form__error"><?= isset($errors['step']) ? 'Заполните это поле' : ''; ?></span>
        </div>
        <div class="form__item <?= isset($errors['completion_date']) ? 'form__item--invalid' : ''; ?>">
            <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="lot-date" type="text" name="completion_date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?= (count($errors) >= 1)  ?  $field['completion_date'] : ''; ?>">
            <span class="form__error"><?= isset($errors['completion_date']) ? 'Заполните это поле' : ''; ?></span>
        </div>
    </div>
    <!-- <span class="form__error form__error--bottom"></span> -->
    <button type="submit" class="button">Добавить лот</button>
</form>