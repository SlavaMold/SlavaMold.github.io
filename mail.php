<?php
// phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$title = "Theme";
$file = $_FILES['file'];

$c = true;

$title = "Comanda";
foreach ( $_POST as $key => $value ) {
  if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
    $body .= "
    " . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
      <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
      <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
    </tr>
    ";
    $array = array(
      $key => $value
    );
 
  }
}

$body = "<table style='width: 100%;'>$body</table>";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth   = true;

  // Post
  $mail->Host       = 'smtp.gmail.com'; // SMTP 
  $mail->Username   = '****@gmail.com'; // log
  $mail->Password   = '********'; // pass
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;

  $mail->setFrom('*****@gmail.com', '132');

  // Getter
  $mail->addAddress('****@gmail.com');

 

  // Send
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  $mail->send();
 
 
} catch (Exception $e) {
  $status = "Error status: {$mail->ErrorInfo}";
}

if ($array['Limba'] = 'Romînă'){
  header('Location: pages/thanks-ro.html');
}

?>
