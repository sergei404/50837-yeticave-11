<?php
require_once 'init.php';
require_once 'functions.php';


$lotId = getParam('id');
$lot = getLot($lotId);
$errors = [];
$result = [];
$result = getRate($lotId);
$currentPrice = $result ? $result[0]['sum'] : $lot['starting_price'];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
    $cost = $_POST['cost'];
    $userId = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
    if (is_numeric($cost) && (int) $cost > 0) {
        $value = $currentPrice + (int) $lot['step'];

        if ($cost >= $value) {
            saveRate($cost, $userId, $lotId);
            $result = getRate($lotId);
        } else {
            $errors['text'] = "Ваша ставка не может быть меньше чем $value";
        }
    } else {
        $errors['text'] = 'Введите число';
    }
}

if ($lot === null) {
    $page_content = include_template('error.php', [$lot,  'http' => 'Ошибка 404']);
} elseif (count($errors)) {
    $page_content = include_template('lead.php', ['goods' =>  getCategories(),  'lot' => $lot,  'error' => $errors, 'rates' => $result, 'currentPrice' => $currentPrice, ]);
} else {
    $page_content = include_template('lead.php', ['goods' =>  getCategories(),  'lot' => $lot, 'rates' => $result, 'currentPrice' => $currentPrice,]);
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'Yeticave - ' . $lot['caption'],
]);

print($layout_content);
