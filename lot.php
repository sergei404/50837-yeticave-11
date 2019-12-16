<?php

require_once 'init.php';
require_once 'functions.php';

$lotId = getGetParam('id');
$lot = getLot($lotId);

if ($lot === null) {
    $lot['caption'] = 'error';
    $page_content = include_template('error_layout.php', $lot);
} else {
    $page_content = include_template('lead.php', ['goods' =>  getCategories(),  'lot' => $lot]);
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' => getCategories(),
    'title' => $lot['caption'],
]);


print($layout_content);

?>
