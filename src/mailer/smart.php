<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$datetime = $_POST['datetime'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mosinfusion@mail.ru';                 // Наш логин
$mail->Password = '3edc#ED';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('mosinfusion@mail.ru', 'Капельницы');   // От кого письмо 
$mail->addAddress('info@mosinfusion.ru'); 
$mail->addAddress('sstamar@gmail.com');    // Add a recipient
$mail->addAddress('summertimejane@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Запись на капельницу';
$mail->Body    = '
		Ура! Новая запись на процедуры <br> 
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
	Время записи: ' . $datetime . '<br>
	Перезвони и подтверди!';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>