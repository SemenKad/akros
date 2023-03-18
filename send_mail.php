<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";

    $mail = new PHPMailer(true);
	
    $mail->CharSet = "UTF-8";
    $mail->IsHTML(true);

    $name = $_POST["name"];
    $email = $_POST["email"];
	$phone = $_POST["phone"];
    $menu = $_POST["menu"];
    $text = $_POST["text"];
    $date = $_POST["date"];
	$date1 = $_POST["date1"];
    $numberguest = $_POST["numberguest"];
	$email_template = "template_mail.html";

    $body = file_get_contents($email_template);
	$body = str_replace('%name%', $name, $body);
	$body = str_replace('%email%', $email, $body);
	$body = str_replace('%phone%', $phone, $body);
	$body = str_replace('%menu%', $message, $body);
    $body = str_replace('%text%', $text, $body);
	$body = str_replace('%date%', $date, $body);
	$body = str_replace('%date1%', $date1, $body);
	$body = str_replace('%numberguest%', $numberguest, $body);

    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'semenkadjarov@yandex.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = 'S89383467537ss'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('semenkadjarov@yandex.ru'); // от кого будет уходить письмо?
$mail->addAddress('mikepe6549@asoflex.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

    if (!$mail->send()) {
        $message = "Ошибка отправки";
    } else {
        header('location: broni.html');
    }
	
	$response = ["message" => $message];

    header('Content-type: application/json');
    echo json_encode($response);


?>