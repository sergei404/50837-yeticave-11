<?php

require_once 'init.php';
require_once 'functions.php';

$userId = $_SESSION['user']['id'];

$ratesArray = showMyRates($userId);


$page_content = include_template('my-bets.php', ['goods' =>  getCategories(), 'arrayBets' => $ratesArray]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'Yeticave -  Мои ставки' ,
]);

print($layout_content);
