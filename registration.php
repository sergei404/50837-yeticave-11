<?php
require_once 'init.php';
require_once 'functions.php';

$tpl_data = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $form = $_POST;
  $fields = ['email', 'password', 'name', 'message'];
  $errors = [];
  $rules = [
    'email' => function ($value) {
      return validateLength($value, 7, 130);
    },
    'password' => function ($value) {
      return validateLength($value, 6, 256);
    },
    'name' => function ($value) {
      return validateLength($value, 3, 70);
    },
    'message' => function ($value) {
      return validateLength($value, 10, 256);
    }
  ];

  foreach ($form as $key => $value) {
    if (isset($rules[$key])) {
      $rule = $rules[$key];
      $errors[$key] = $rule($value);
    }

    if (in_array($key,  $fields) && empty($value)) {
      $errors[$key] = "Поле $key надо заполнить";
    }
  }

  if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Не корректный адрес'; 
  }
  
 
  $errors = array_filter($errors);

  if (empty($errors)) {
    $link =  getDbConnection();
    $email = mysqli_real_escape_string($link, $form['email']);
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $res = mysqli_query($link, $sql);

    if (mysqli_num_rows($res) > 0) {
      $errors['email'] = 'Пользователь с этим email уже зарегистрирован';
    } else {
      $form['password'] = password_hash($form['password'], PASSWORD_DEFAULT);
      $orderedFormData = [$form['email'], $form['name'], $form['password'], $form['message']];

      $sql = 'INSERT INTO users (date, email, name, password, contacts) VALUES (NOW(), ?, ?, ?, ?)';
      $stmt = db_get_prepare_stmt($link, $sql, $orderedFormData);
      $res = mysqli_stmt_execute($stmt);
    }
    if ($res && empty($errors)) {
      header("Location: /enter.php");
      exit();
    }
  }

  $tpl_data['errors'] = $errors;
  $tpl_data['values'] = $form;
}

$page_content = include_template('registration_form.php', $tpl_data);
$layout_content = include_template('layout.php', [
  'content'    => $page_content,
  'goods' => [],
  'title' => 'Yeticave | Регистрация',
]);

print($layout_content);
