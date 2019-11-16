<?php

require_once 'functions.php';
require_once 'data.php';


$inquiryLots =  'SELECT  l.*, c.title FROM  lots l RIGHT JOIN categories c ON l.category_id = c.id ';
$inquiryCategories = 'SELECT * FROM categories';

$page_content = include_template('main.php', [
    'adverts' => getDataFromDatabase($inquiryLots),
    'goods' => getDataFromDatabase($inquiryCategories)
]);
    
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getDataFromDatabase($inquiryCategories),
    'title' => 'YetiCave - Главная страница',
    'isAuth' => $is_auth,
    'nameUser' => $user_name,
]);

print($layout_content);
?>