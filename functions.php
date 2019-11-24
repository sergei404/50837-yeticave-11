<?php
function priceFormat(float $num):string {
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

function esc($str): string {
    $text = htmlspecialchars($str);

    return $text;
}


function diffTime($timeValue): array {
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

function getDbConnection(): mysqli {
    $db_connect = mysqli_connect('localhost', 'root', '', 'yeticave');

    if ($db_connect === false) {
        return false;
    }

    mysqli_set_charset($db_connect, "utf8");

    return $db_connect;
}

function runSql($quiry) {
    $db_connect = getDbConnection();

    if ($db_connect === false) {
        return false;
    }    
    
    $result = mysqli_query($db_connect, $quiry);
    
    return $result;
}

function getLots(): array {
    $sql = 'SELECT  l.*, c.title FROM  lots l JOIN categories c ON l.category_id = c.id ';

    $result = runSql($sql);

    if ($result === false) {
        return null;
    }

    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $dataArray;
}


function getCategories(): array {
    $sql = 'SELECT * FROM categories';

    $result = runSql($sql);

    if ($result === false) {
        return [];
    }

    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $dataArray;
}

function getGetParam($param) {
    $id = filter_input(INPUT_GET, $param);

    return $id;
}


function getLot(int $id): ?array {

    if((boolean)$id) {
        $sql = 'SELECT  l.*, c.title FROM  lots l JOIN categories c ON l.category_id = c.id WHERE l.id = ' .  $id . '';
    }

    $result = runSql($sql);
    
    // Проверяем, успешно ли выполнился запрос
    if ($result === false) {
        return null;
    }

    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // В результате должн найтись именно один лот, ни больше ни меньше.
    if (count($dataArray) !== 1) {
        return null;
    }

    return $dataArray[0];
}


?>

