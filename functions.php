<?php
function priceFormat(float $num): string {
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

function getParam($param) {
    $id = filter_input(INPUT_GET, $param);
    return $id;
}

function getLot(?string $id): ?array {
    $sql = 'SELECT  l.*, c.title FROM  lots l JOIN categories c ON l.category_id = c.id WHERE l.id = ' . $id;
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

function db_get_prepare_stmt($link, $sql, $data = []) {
    $stmt = mysqli_prepare($link, $sql);
  
    if ($data) {
        $types = '';
        $stmt_data = [];
        foreach ($data as $value) {
            $type = null;
            if (is_int($value)) {
                $type = 'i';
            }
            else if (is_string($value)) {
                $type = 's';
            }
            else if (is_double($value)) {
                $type = 'd';
            }
            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }
        
        $values = array_merge([$stmt, $types], $stmt_data);
        $func = 'mysqli_stmt_bind_param'; 
        $func(...$values);
    }

    return $stmt;
}

function validateNumericalValues($num) {
    if ($num  >  0) {
        return null;
    }
    return "Значение не может быть меньше 0";
}

function is_date_valid(string $date)  {
    $result = strtotime($date) -  time();
    if ( $result  >= 86400) {
        return null;
    }
    
    return 'Введенная дата не может быть меньше нынешней плюс 1 день';
}

function getSearchLots(?string $str): array {
    $sql = 'SELECT  l.*, c.title FROM  lots l JOIN categories c ON l.category_id = c.id  WHERE MATCH (l.caption, l.discription) AGAINST(?)';
    $link =  getDbConnection();
    $stmt = db_get_prepare_stmt($link, $sql, [$str]);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

    $dataArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $dataArray;
}