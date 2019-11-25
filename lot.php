<?php

require_once 'functions.php';
require_once 'data.php';

$lotId = getGetParam('id');

$lot = getLot($lotId);

if ($lot === null) {
    $lot['caption'] = 'error';
    $page_content = include_template('error.php', $lot);
} else {
    $page_content = include_template('lot.php', ['goods' =>  getCategories(),  'lot' => $lot]);
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => $lot['caption'],
    'isAuth' => $is_auth,
    'nameUser' => $user_name,
]);


print($layout_content);
