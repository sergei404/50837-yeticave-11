<?php

require_once 'init.php';
require_once 'functions.php';

$userId = $_SESSION['user']['id'];

$ratesArray = getRate($userId);


$page_content = include_template('my-bets.php', ['goods' =>  getCategories(), 'array' => $ratesArray]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'Yeticave -  Мои ставки' ,
]);

print($layout_content);
