<?php

$is_auth = rand(0, 1);
$user_name = 'Сергей'; 

$goods = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];


$adverts = [
    ['name' => '2014 Rossignol District Snowboard', 'category' => 'Доски и лыжи', 'price' => 10999, 'url' => 'img/lot-1.jpg', 'expiration date' => randTime(time(), strtotime('+ 2 day'))],
    ['name' => 'DC Ply Mens 2016/2017 Snowboard', 'category' => 'Доски и лыжи', 'price' => 159999, 'url' => 'img/lot-2.jpg', 'expiration date' => randTime(time(), strtotime('+ 2 day'))],
    ['name' => 'Крепления Union Contact Pro 2015 года размер L/XL', 'category' => 'Крепления', 'price' => 8000, 'url' => 'img/lot-3.jpg', 'expiration date' => randTime(time(), strtotime('+ 2 day'))],
    ['name' => 'Ботинки для сноуборда DC Mutiny Charocal', 'category' => 'Ботинки', 'price' => 10999, 'url' => 'img/lot-4.jpg', 'expiration date' => randTime(time(), strtotime('+ 2 day'))],
    ['name' => 'Куртка для сноуборда DC Mutiny Charocal', 'category' => 'Одежда', 'price' => 7500, 'url' => 'img/lot-5.jpg', 'expiration date' => randTime(time(), strtotime('+ 2 day'))],
    ['name' => 'Маска Oakley Canopy', 'category' => 'Разное', 'price' => 5400, 'url' => 'img/lot-6.jpg', 'expiration date' => randTime(time(), strtotime('+ 2 day'))],
];

?>