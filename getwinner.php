<?php

require_once 'vendor/autoload.php';
require_once 'init.php';
require_once 'functions.php';

$transport = new Swift_SmtpTransport("phpdemo.ru", 25);
$transport->setUsername("keks@phpdemo.ru");
$transport->setPassword("htmlacademy");

$mailer = new Swift_Mailer($transport);

$sql = "SELECT r.sum, r.lot_id, l.completion_date, l.caption, u.name, u.email FROM rates r JOIN lots l ON r.lot_id = l.id JOIN users u ON r.rate_user_id = u.id";
$link = getDbConnection();
$res = mysqli_query($link, $sql);
$recipients = [];

if ($res) {
    $completionDataArray = mysqli_fetch_all($res, MYSQLI_ASSOC);
    foreach ($completionDataArray as $itemData) {
        if (strtotime($itemData['completion_date']) > (time() - 86400) && strtotime($itemData['completion_date']) <=  time()) {
            $recipients[$itemData['email']] = $itemDatar['name'];
            $message = new Swift_Message();
            $message->setSubject("Ваша ставка победила");
            $message->setFrom(['keks@phpdemo.ru' => 'Yeticave']);
            $message->setBcc($recipients);

            $msg_content = include_template('email.php', ['itemData' => $itemData]);
            $message->setBody($msg_content, 'text/html');
        }
    }
}
