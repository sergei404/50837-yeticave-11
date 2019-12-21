<?php
require_once 'init.php';
require_once 'functions.php';

$lotId = getParam('id');
$lot = getLot($lotId);
$userId = $_SESSION['user']['id'];
$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cost = $_POST['cost'];
    
    if(is_numeric($cost) && (integer) $cost > 0) {
        $currentPrice = $lot['starting_price'];

        $rate = getMaxRate($lotId);
       
        if ($rate !== null) {
            $currentPrice = $rate;
        }

        if ($cost >= $currentPrice + (integer)$lot['step']) {
            saveRate($cost, $userId, $lotId);
        //    $result = getRate($lot['id']);
        //    var_dump($result);
        }
        else {
            $value = $currentPrice + (integer) $lot['step'];
            $errors['text'] = "Ваша ставка не может быть меньше чем $value";
        }
    }
    else {
        $errors['text'] = 'Введите число';
    }
}

if ($lot === null) {
    $page_content = include_template('error.php', [$lot,  'http' => 'Ошибка 404']);
} 
elseif(count($errors)) {
    $page_content = include_template('lead.php', ['goods' =>  getCategories(),  'lot' => $lot,  'error' => $errors,]);
}
else {
    $page_content = include_template('lead.php', ['goods' =>  getCategories(),  'lot' => $lot, ]);
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => 'Yeticave - ' . $lot['caption'],
]);

print($layout_content);
