<?php

require_once 'functions.php';
require_once 'data.php';

$lotId = getGetParam('id');
if ($lotId === null || $lotId === false) {
    $page_content = $content = include_template('error.php', []);
}


$lot = getLot($lotId);
if ($lot === null) {
  $page_content = $content = include_template('error.php', []);
} else {
   $page_content = include_template('sampleLot.php', ['goods' =>  getCategories(),  'lot' => $lot]);
}


  


$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'goods' => getCategories(),
  'title' => $lot['caption'],
  'isAuth' => $is_auth,
  'nameUser' => $user_name,
]);


print($layout_content);
