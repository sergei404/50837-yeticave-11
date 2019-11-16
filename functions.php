<?php
function priceFormat(float $num) {
    $num = number_format(ceil($num), 0, '', ' ');
    return "{$num}  &#8381;";
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require $name;
    $result = ob_get_clean();
    return $result;
}
function esc($str) {
    $text = htmlspecialchars($str);

    return $text;
}


function diffTime($timeValue) {
    $result = strtotime($timeValue) - time();
    $hours = floor($result / 3600);
    $minutes = floor(($result % 3600) / 60);
    $arrayDiff[] = $hours;
    $arrayDiff[] = $minutes;
    
    return $arrayDiff;
}



function paddingLine(int $value): string {
    return str_pad($value, 2, "0", STR_PAD_LEFT);
}

// $dbh = new \PDO(
//     'mysql:host=localhost;dbname=yeticave;',
//     'root',
//     ''
// );
// $dbh->exec("SET NAMES UTF8");

// $stm = $dbh->prepare('SELECT * FROM `lots`');
// $stm->execute();

//$allUsers = $stm->fetchAll();

function getDataFromDatabase($inquiry) {
    $dataArray = [];
    $db_connect = mysqli_connect('localhost', 'root', '', 'yeticave');

    mysqli_set_charset($db_connect, "utf8");

    if (!$db_connect) {
        $error = mysqli_connect_error();
    } else {
        $sql = $inquiry;
        $result = mysqli_query($db_connect, $sql);
    
        if ($result) {
            $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    return $dataArray;
}

?>