<?php
function priceFormat(float $num)
{
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

?>