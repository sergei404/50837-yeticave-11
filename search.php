<?php
require_once 'init.php';
require_once 'functions.php';

if (isset($_GET['search'])) {
    $search = trim($_GET['search']) ;
    $lots = getSearchLots($search);
    if (count($lots) ===  0) {
        $page_content = include_template('search.php', ['goods' =>  getCategories(),  'lots' => []]);
    }
    else {
        $page_content = include_template('search.php', ['goods' =>  getCategories(),  'lots' => $lots, 'search' => $search]);
    }
 }

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'Yeticave - Поиск'
]);

print($layout_content);