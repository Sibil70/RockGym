<?php
$recipients = array("sans87@inbox.ru");

if (isset($_POST['submit'])) {
    $to = implode(',', $recipients);
    $from = htmlspecialchars($_POST['email']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = "Письмо с сайта str-ing.pro";

    $message = "От " . $first_name . ". Номер для связи " . $phone . ". Почта " . $from . " Сообщение " . htmlspecialchars($_POST['message']);

    $mail_message = '
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body>
            <br/> ' . $message . '
        </body>
    </html>
        ';

    $headers = "From: <" . $from . ">\r\n" .
        "MIME-Version: 1.0" . "\r\n" .
        "Content-type: text/html; charset=utf-8" . "\r\n";

    mail($to, $subject, $mail_message, $headers);

    // header('Location:https://rockgym.tomsk.ru/');
}
