<?php
$recipients = array("sans87@inbox.ru");

if (isset($_POST['message']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['first_name'])) {
    $to = implode(',', $recipients);
    $from = htmlspecialchars($_POST['email']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = "Письмо с сайта RockGym";

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

    $message = '
    <div class="response">
            <div class="response-info">
                <p class="response-text margin-b-5">Спасибо, ваше сообщение отправлено!</p>
                <p class="response-text margin-b-5">Мы с вами свяжемся в ближайшее время</p>
            </div>
        </div>
    ';
    echo $message;
} else {
    $message = '
    <div class="response">
            <div class="response-info">
                <p class="response-text margin-b-5">Спасибо, ваше сообщение не отправлено!</p>
                <p class="response-text margin-b-5">Мы с вами свяжемся в ближайшее время</p>
            </div>
        </div>
    ';
    echo $message;
}