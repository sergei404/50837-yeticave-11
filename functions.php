<?php

$is_auth = rand(0, 1);
$user_name = 'Сергей'; // укажите здесь ваше имя

function getUserAuth($is_auth, $user_name)
{
    if ($is_auth) {
        $htmlStr = '<div class="user-menu__logged">
        <p>' . $user_name . '</p>
        <a class="user-menu__bets" href="pages/my-bets.html">Мои ставки</a>
        <a class="user-menu__logout" href="#">Выход</a>
      </div>';
    } else {
        $htmlStr = '<ul class="user-menu__list">
        <li class="user-menu__item">
         <a href="#">Регистрация</a>
         </li>
         <li class="user-menu__item">
         <a href="#">Вход</a>
        </li>
        </ul>';
    }
    return $htmlStr;
}


function getPriceFormat(float $num) 
{
    $num = number_format(ceil($num), 0, '', ' ');
    return "{$num}  &#8381;";
}


function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

?>