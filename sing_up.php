<?php
require_once 'init.php';
require_once 'functions.php';

$tpl_data = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $form = $_POST;
  $errors = [];
  $fields = ['email', 'password', 'name'];
  foreach ($form as $key =>$value) {
    if (in_array($key, $fields) && empty($value)) {
        $errors[$key] = "Это поле надо заполнить";
    }
  }

  if (empty($errors)) {
    $email = mysqli_real_escape_string($link, $form['password']);
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $res = mysqli_query($link, $sql);
    if (mysqli_num_rows($res) > 0) {
      $errors[] = 'Пользователь с этим email уже зарегистрирован';
    }
    else {
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

$page_content = include_template('sing_up_form.php', $tpl_data);
$layout_content = include_template('layout.php', [
    'content'    => $page_content,
    'goods' => [],
    'title' => 'Yeticave | Регистрация',
]);
print($layout_content);