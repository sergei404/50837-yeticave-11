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
    $date = date('Y-m-d', rand($from, $to));
    return $date;
}
function diffTime($timeValue) {
    $datetime1 = date_create($timeValue);
    $datetime2 = date_create("now");
    $interval = $datetime1->diff($datetime2);
    $arrayDiff = [];
    $hours = $interval->format('%h total hours') + ($interval->format('%d') * 24) + ($interval->format('%m') * 30 *24);
    $minutes = $interval->format('%i');
    array_push($arrayDiff, $hours, $minutes);
    return $arrayDiff;
}
function paddingLine(int $value)  : string {
    
    return str_pad($value, 2, "0", STR_PAD_LEFT);
   
}
?>