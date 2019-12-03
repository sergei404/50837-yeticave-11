<?php

require_once 'functions.php';
require_once 'data.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field = $_POST;

    $filename = uniqid() . '.png';
    move_uploaded_file($_FILES['lot-img']['tmp_name'], 'uploads/' . $filename);
    $field['photo'] = $filename;
    $field['create_date'] = 'NOW()';
    $field['author_user_id'] = 1;

    print_r($field);
    $sql = 'INSERT INTO lots (create_date, caption, discription,  photo, starting_price, completion_date, step, author_user_id,  category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    $stmt = db_get_prepare_stmt(getDbConnection(), $sql, $field);

    

    $res = mysqli_stmt_execute($stmt);

    echo("\n<br>stmt: ");
    var_dump($stmt);

    if ($res === false) {
        var_dump(mysqli_error(getDbConnection()));
    }


    // mysqli_stmt_close($stmt);
    if ($res) {
        $lot_id = mysqli_insert_id(getDbConnection());

        header("Location: lot.php?id=" . $lot_id);
    } else {
        $page_content = include_template('error.php', ['error' => mysqli_error(getDbConnection())]);
    }
}
//     $required = ['starting_price', 'step', 'completion_date'];
//     $errors = [];
//     $rules = [
//         'starting_price' => function($value)  {
//             return validateNumericalValues($value);
//         },
//         'step' => function($value) {
//             return validateNumericalValues($value);
//         },
//         'completion_date' => function($value) {
//             return is_date_valid($value);
//         }
//     ];

//     $field = filter_input_array(INPUT_POST, ['starting_price' => FILTER_DEFAULT, 'step' => FILTER_DEFAULT, 'completion_date' => FILTER_DEFAULT], true);


//     foreach ($field as $key => $value) {
//         if (isset($rules[$key])) {
//             $rule = $rules[$key];
//             $errors[$key] = $rule($value);
//         }

//         if (in_array($key, $required) && empty($value)) {
//                 $errors[$key] = "Поле $key надо заполнить";
//         }
//     }

//     if (!empty($_FILES['lot-img']['name'])) {
// 		$tmp_name = $_FILES['lot-img']['tmp_name'];
//       $path = $_FILES['lot-img']['name'];

//         $finfo = finfo_open(FILEINFO_MIME_TYPE);
//         $file_type = finfo_file($finfo, $tmp_name);
//         echo $file_type;
//     if ($file_type !== "image/png" || $file_type !== "image/jpeg" || $file_type !== "image/jpg" ) {
// 		$errors['file'] = 'Загрузите картинку в формате png, jpeg или jpg';
// 	} else {
//         $filename =  __DIR__ . 'uploads/' . $path;
// 		move_uploaded_file($tmp_name, 'uploads/' . $filename);
//         $field['path'] = $filename;
//         echo $filename;
// 	}
// } else {
// 	$errors['file'] = 'Вы не загрузили файл';
// }

//     if (count($errors)) {
// 		$page_content = include_template('add.php', ['field' => $field, 'errors' => $errors]);
// 	}   else {
//             $sql = 'INSERT INTO lots (caption, discription,  photo, starting_price, completion_date, step, author_user_id, category_id) VALUES (?, ?, ?, ?, ?, ?,?, 1)';
//             $stmt = db_get_prepare_stmt(getDbConnection(), $sql, $field);
//             $res = mysqli_stmt_execute($stmt);

//             if ($res) {
//                 $lot_id = mysqli_insert_id(getDbConnection());

//                 header("Location: ../lot.php?id=" . $lot_id);
//             }
// 	    }
// } else {
// 	$page_content = include_template('form.php', ['goods' =>  getCategories()]);
// }


$page_content = include_template('form.php', ['goods' =>  getCategories()]);


$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'goods' =>  getCategories(),
    'title' => 'Добавить лот',
    'isAuth' => $is_auth,
    'nameUser' => $user_name,
]);

print($layout_content);
