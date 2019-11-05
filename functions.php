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

function randTime(int $from, int $to) {
    $date = rand($from, $to);
    return $date;
}

function diffTime($timeValue) {
    $result = $timeValue - time();
    $hours = floor($result / 3600);
    $minutes = floor(($result % 3600) / 60);
    // $datetime1 = date_create($timeValue);
    // $datetime2 = date_create("now");
    // $interval = $datetime1->diff($datetime2);
    $arrayDiff[] = $hours;
    $arrayDiff[] = $minutes;
    // array_push($arrayDiff, ($interval->h + $interval->d * 24 + $interval->m * 30 * 24), $interval->i);
    return $arrayDiff;
}



function paddingLine(int $value): string {

    return str_pad($value, 2, "0", STR_PAD_LEFT);
}

?>