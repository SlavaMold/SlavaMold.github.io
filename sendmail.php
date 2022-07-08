<?php

use PHPMailer/PHPMailer/PHPMailer;
use PHPMailer/PHPMailer/Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail ->CharSet = 'UTF-8';
$mail ->setLanguage('ru', 'phpmailer/laguage/');
$mail->IsHTML(true);

$mail->setFrom('avezpal@gmail.com', 'Test');
$mail->addAddress('johnydee00@gmail.com');

$mail-> Subject = 'Покупка товаров';

$body = '<h1>Покупка товаров</h1>';
$body = '<p><strong>Имя покупателя:</strong>'.$_POST['name'].'</p>';
$body = '<p><strong>Адрес электронной почты:</strong>'.$_POST['email'].'</p>';
$body = '<p><strong>Телефон:</strong>'.$_POST['phone'].'</p>';

$mail->Body = $body;

if(!$mail->send()){

   $message = 'Error!';

}
else{
    $message = 'Отправлено!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response); 