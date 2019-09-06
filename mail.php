<?php
    $to = "valeron181100@mail.ru";
    $subject = "Pip Service FeedBack. Name: " . $_POST['name'] . ", Email: " . $_POST['email'];
    $message = $_POST['message'];
    $convertedMessage = mb_convert_encoding($message, 'utf-8', mb_detect_encoding($message));
    echo mail($to, $subject, $convertedMessage, $headers);
?>