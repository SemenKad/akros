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

    $mail->addAddress("semenkadjarov@yandex.ru");   // Здесь введите Email, куда отправлять
	$mail->setFrom($email);
    $mail->Subject = "[Заявка с формы]";
    $mail->MsgHTML($body);

    if (!$mail->send()) {
        $message = "Ошибка отправки";
    } else {
        $message = "Данные отправлены!";
    }
	
	$response = ["message" => $message];

    header('Content-type: application/json');
    echo json_encode($response);


?>