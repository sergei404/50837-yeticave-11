<?php
require_once 'init.php';
require_once 'functions.php';

$page_content = include_template('error.php', [ 'http' => 'Ошибка 403']);

$layout_content = include_template('error_layout.php', [
     'content' => $page_content,
     'title' => 'Ошибка'
]);

print($layout_content);
