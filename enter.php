<?php
 
 require_once 'init.php';
 require_once 'functions.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $form = $_POST;
     $errors = [];
     $required = ['email', 'password'];
     
     foreach ($form as $key =>$value) {
         if (in_array($key, $required) && empty($value)) {
             $errors[$key] = "Это поле надо заполнить";
         }
     }
     
     $email = mysqli_real_escape_string($link, $form['email']);
     $sql = "SELECT * FROM users WHERE email = '$email'";
     $res = mysqli_query($link, $sql);
     $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;
     
     if (!count($errors) && $user) {
         if (password_verify($form['password'], $user['password'])) {
             $_SESSION['user'] = $user;
         }
         else {
             $errors['password'] = 'Неверный пароль';
         }
     }
     else {
         $errors['email'] = 'Такой пользователь не найден';
     }
     
     if (count($errors)) {
         $page_content = include_template('enter_form.php', ['form' => $form, 'errors' => $errors]);
     }
     else {
         header("Location: /");
         exit();
     }
 }
 else {
     $page_content = include_template('enter_form.php', []);
     if (isset($_SESSION['user'])) {
         header("Location: /index.php");
         exit();
     }
 }
 $layout_content = include_template('layout.php', [
     'content'    => $page_content,
     'goods' => [],
     'title' => 'Yeticave | Аутентификация',
 ]);
 print($layout_content);