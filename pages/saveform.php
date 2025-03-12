<?php 

require_once '../functions/connect.php'; 

header('Content-Type: application/json'); // Устанавливаем заголовок JSON

$response = ['status' => 'error']; // Ответ по умолчанию

if($_POST['acc'] == "resp"){

$name = $_POST['name'];
$tel = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['Message'];
$goodslist = $_POST['goodslist'];
$social = '';
if($_POST['ord'] == "ordered"){
    $order = 'С доставкой';
}
else{
    $order = 'Без доставки';
}

if(!empty($_POST['Viber'])){
    $social .= ' Viber';
}

if(!empty($_POST['WhatsApp'])){
    $social .= ' WhatsApp';
}

if(!empty($_POST['Telegram'])){
    $social .= ' Telegram';
}

if(empty($_POST['Telegram']) & empty($_POST['WhatsApp']) & empty($_POST['Viber'])){
    $social = 'Нет соц. сетей';
}

$token = '7701843299:AAGOdIfVmeAgRd95JiV_TJthPCSILd8Ss-g';
$chat_id = "-4712398268";

$msg = array(
    'Numele, prenumele' => $name,
    'Numar de telefon' => $tel,
    'Email' => $email,
    'Message' => $message,
    'A comandat' => $goodslist,
    'Social Media' => $social,
    'Livrare' => $order
);
    $txt = '';
    foreach ($msg as $item => $value) {
       $txt .= "<b>" . $item . "</b>: " . $value . "%0A";
    }

    $sendToTelegram =
        fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=HTML&text={$txt}", "r");
if ($sendToTelegram) {
    $response['status'] = 'ok';
    echo json_encode($response);
}
else{
    $response['status'] = 'error';
    echo json_encode($response);
}
    //$imgtosave = '';
//
//for($kay = 0; $kay < count($_FILES['files']['tmp_name']); $kay++){
//     $imgtosave.= $_FILES['files']['name'][$kay];
//     $imgtosave.= '|';
//}

//function getIp(){
//    $couses = [
//        'HTTP_CLIENT_IP',
//        'HTTP_X_FORWARDED_FOR',
//        'REMOTE_ADDR'
//    ];
//
//    foreach ($couses as $couse) {
//        if (!empty($_SERVER[$couse])){
//            $ip = trim(end(explode(',', $_SERVER[$couse])));
//            if (filter_var($ip, FILTER_VALIDATE_IP)){
//                return $ip;
//            }
//        }
//    }
//
//}

//$ip_adress = getIp();


//mysqli_query($connect, "INSERT INTO `message` (`id`, `name`, `email`, `phone`, `social`, `message`, `ordered`, `what_ordered`, `images`, `ip`) VALUES (NULL, '$name', '$email', '$tel', '$social', '$message', '$order', '$goodslist', '$imgtosave', '$ip_adress')");

//mail
//require 'phpmailer/PHPMailer.php';
//require 'phpmailer/SMTP.php';
//require 'phpmailer/Exception.php';
//
//$title = "Новый заказ";
//$body = "На сайте что-то заказали";
//
//$mail = new PHPMailer\PHPMailer\PHPMailer();
//
//try {
//  $mail->isSMTP();
//  $mail->CharSet = "UTF-8";
//  $mail->SMTPAuth   = true;
//
//  $mail->Host       = 'smtp.gmail.com'; // SMTP
//  $mail->Username   = 'avezpal@gmail.com'; // log
//  $mail->Password   = 'aeujztehracourrk'; // pass
//  $mail->SMTPSecure = 'ssl';
//  $mail->Port       = 465;
//
//  $mail->setFrom('avezpal@gmail.com', '132');
//
//  // Getter
//  $mail->addAddress('avezpal@gmail.com');
//
//
//
//  // Send
//  $mail->isHTML(true);
//  $mail->Subject = $title;
//  $mail->Body = $body;
//
//  $mail->send();
//}
// catch (Exception $e) {
//  $status = "Error status: {$mail->ErrorInfo}";
//}
//
//
//$response = array();
//$response['status'] = 'bad';
//
//
//$last_id = $connect->insert_id;
//
//$upload_path = __DIR__ . '/ssp/saved/' . "$last_id";
//    if(!file_exists($upload_path)){
//         mkdir($upload_path, 0777, true);
//    }
//$upload_path.= '/';
//
//if(!empty($_FILES['files']['tmp_name'])){
//    for($key = 0; $key < count($_FILES['files']['tmp_name']); $key++){
//        $user_filename = $_FILES['files']['name'][$key];
//        $user_basename = pathinfo($user_filename, PATHINFO_FILENAME);
//        $user_extension = pathinfo($user_filename, PATHINFO_EXTENSION);
//
//        $server_filename = $user_basename . "." . $user_extension;
//        $server_filepath =  $upload_path . $server_filename;
//
//        $i = 0;
//        while (file_exists($server_filepath)) {
//            $i++;
//            $server_filepath = $upload_path . $user_basename . "($i)" . "." . $user_extension;
//        }
//        if(copy($_FILES['files']['tmp_name'][$key], $server_filepath)){
//            $response['status'] = 'ok';
//        }
//
//    }
//}
//
//$_POST = array();
//$_POST['response'] = $response;
//
//echo json_encode($response);
//}
//else{
//    die('<a href="../index.php"> return back </a>');
}
?>