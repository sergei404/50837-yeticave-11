<form class="form container <?= count($errors)  ?  'form--invalid' : ''; ?>" action="registration.php" method="post" autocomplete="off">
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?= isset($errors['email']) ? 'form__item--invalid' : ''; ?>">
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$values['email'] ?? ''; ?>">
        <span class="form__error"><?= $errors['email'] ?? ''; ?></span>
    </div>
    <div class="form__item <?= isset($errors['password']) ? 'form__item--invalid' : ''; ?>">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error"><?= $errors['password'] ?? ''; ?></span>
    </div>
    <div class="form__item <?= isset($errors['name']) ? 'form__item--invalid' : ''; ?>">
        <label for="name">Имя <sup>*</sup></label>
        <input id="name" type="text" name="name" placeholder="Введите имя" value="<?=$values['name'] ?? ''; ?>">
        <span class="form__error"><?= $errors['name'] ?? ''; ?></span>
    </div>
    <div class="form__item <?= isset($errors['message']) ? 'form__item--invalid' : ''; ?>">
        <label for="message">Контактные данные <sup>*</sup></label>
        <textarea id="message" name="message" placeholder="Напишите как с вами связаться" ><?=$values['message'] ?? ''; ?></textarea>
        <span class="form__error"><?= $errors['message'] ?? ''; ?></span>
    </div>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="../enter.php">Уже есть аккаунт</a>
</form>