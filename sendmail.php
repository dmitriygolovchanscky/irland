<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'PHPMailer/language/');
	$mail->IsHTML(true);
	$mail->SMTPSecure = 'ssl';

	//От кого письмо
	$mail->setFrom('sunsxt@yandex.ru', 'Дмитрий');
	//Кому отправить
	$mail->addAddress('diman2005902@gmail.com');
	//Тема письма
	$mail->Subject = 'Привет!';

	//Тело письма
	$body = '<h1>Встречайте супер письмо!</h1>';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['tel']))){
		$body.='<p><strong>Телефон</strong> '.$_POST['tel'].'</p>';
	}

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>