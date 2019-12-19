<?php
 
 require_once 'init.php';
 require_once 'functions.php';

 if (isset($_SESSION['user'])) {
    header("Location: /index.php");
    exit();
}

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $form = $_POST;
     $errors = [];
     $required = ['email', 'password'];

     $link =  getDbConnection();
     $email = mysqli_real_escape_string($link, $form['email']);
     
     $sql = "SELECT * FROM users WHERE email = '$email'";
     $res = mysqli_query($link, $sql);
     $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;
     
     if ($user['email'] !== $email && $email !== ''){
        $errors['email'] = 'Такой пользователь не найден';
     }
     elseif ($email == '') {
        $errors['email'] = "Это поле надо заполнить";
     }
     else {
          if (password_verify($form['password'], $user['password'])) {
            $_SESSION['user'] = $user;
         }
         elseif (!(password_verify($form['password'], $user['password'])) && $form['password'] !== '') {
             $errors['password'] = 'Неверный пароль';
         } 
         else {
           $errors['password'] = "Это поле надо заполнить";
         }
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

 }

 $layout_content = include_template('layout.php', [
     'content'    => $page_content,
     'goods' => [],
     'title' => 'Yeticave | Аутентификация',
 ]);
 print($layout_content);