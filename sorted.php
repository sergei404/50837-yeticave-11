<?php

require_once 'init.php';
require_once 'functions.php';

$paramId =  getParam('id');
$lots = getSortedLots($paramId);
if(isset($lots[0]['title'])) {
    $title =  $lots[0]['title'];
}

if (count($lots) ===  0) {
    $page_content = include_template('search.php', ['goods' =>  getCategories(),  'lots' => []]);
}
else {
    $page_content = include_template('sorted.php', ['goods' =>  getCategories(),   'lots' => $lots, 'title' => $title]);
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'Yeticave - Поиск'
]);

print($layout_content);
