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

?>