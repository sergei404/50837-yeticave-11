<?php
require_once 'init.php';
require_once 'functions.php';

$lotId = getParam('id');
$lot = getLot($lotId);

if ($lot === null) {
    $lot['caption'] = 'error';
    $page_content = include_template('error.php', [$lot,  'http' => 'Ошибка 404']);
} else {
    $page_content = include_template('lead.php', ['goods' =>  getCategories(),  'lot' => $lot]);
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'Yeticave - ' . $lot['caption'],
]);

print($layout_content);
?>