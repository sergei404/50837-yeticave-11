<?php

require_once 'data.php';
require_once 'functions.php';

$page_content = include_template('main.php', [
    'adverts' => $adverts,
    'goods' => $goods
    ]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => $goods,
    'title' => 'YetiCave - Главная страница',
    'isAuth' => $is_auth,
    'nameUser' => $user_name,
]);


print($layout_content);
?>