<?php
session_start();

function getDbConnection(): mysqli {
    $db_connect = mysqli_connect('localhost', 'root', '', 'yeticave');

    if ($db_connect === false) {
        return false;
    }

    mysqli_set_charset($db_connect, "utf8");

    return $db_connect;
}

$link =  getDbConnection();