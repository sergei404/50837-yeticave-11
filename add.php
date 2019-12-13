<?php
require_once 'functions.php';
require_once 'data.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $required = ['starting_price', 'completion_date', 'step'];
    $errors = [];
    $rules = [
        'starting_price' => function($value)  {
            return validateNumericalValues($value);
        },
        'step' => function($value) {
            return validateNumericalValues($value);
        },
        'completion_date' => function($value) {
            return is_date_valid($value);
        }
    ];

    $field = filter_input_array(INPUT_POST, ['caption'=> FILTER_DEFAULT, 'discription' => FILTER_DEFAULT, 'starting_price' => FILTER_DEFAULT, 'completion_date' => FILTER_DEFAULT,  'step' => FILTER_DEFAULT, 'category_id' => FILTER_DEFAULT], true);
    
    foreach ($field as $key =>$value) {
        
        if (isset($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule($value);
        }
        
        if (in_array($key, $required) && empty($value)) {
            $errors[$key] = "Поле $key надо заполнить";
        }
    }
    $errors = array_filter($errors);
    if (!empty($_FILES['lot-img']['name'])) {
		$tmp_name = $_FILES['lot-img']['tmp_name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        
        if ($file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "image/jpg" ) {
            $errors['file'] = 'Загрузите картинку в формате png, jpeg или jpg';
        } else {
            $filename = uniqid() . '.' . explode('/', $file_type)[1];
            move_uploaded_file($tmp_name, 'uploads/' . $filename);
            $field['photo'] = $filename;
        }
    } 	
    
    if (count($errors)) {
		$page_content = include_template('form.php', ['field' => $field, 'errors' => $errors, 'goods' =>  getCategories()]);
	} else {
        $sql = 'INSERT INTO lots (create_date, caption, discription,  photo, starting_price, completion_date, step, author_user_id, category_id) VALUES (NOW(), ?, ?, ?, ?, ?, ?, 1, ?)';
       
        $data = [$field['caption'], $field['discription'], $field['photo'], $field['starting_price'], $field['completion_date'],  $field['step'], $field['category_id']];
       
        $link = getDbConnection();
        $stmt = db_get_prepare_stmt($link, $sql, $data);
        $res = mysqli_stmt_execute($stmt);
        if ($res) {
            $lot_id = mysqli_insert_id($link);
            header("Location: lot.php?id=" . $lot_id);
        }
	}
} else {
        $page_content = include_template('form.php', ['errors' => [], 'goods' =>  getCategories()]);
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' =>  getCategories(),
    'title' => 'Добавить лот',
    'isAuth' => $is_auth,
    'nameUser' => $user_name,
]);

print($layout_content);

?>