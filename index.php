<?php
require_once 'init.php';
require_once 'functions.php';

$page_content = include_template('main.php', [
    'adverts' => getLots(),
    'goods' =>  getCategories()
]);
    
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'YetiCave - Главная страница',
]);

print($layout_content);
?>