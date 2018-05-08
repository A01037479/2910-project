<?php

if(count($_POST) == 0) {
    header("Location: index.php");
    exit;
} else {
    $escaped_name = htmlspecialchars($_POST['name']);
    $escaped_subject = htmlspecialchars($_POST['subject']);
    $escaped_msg = htmlspecialchars($_POST['message']);
    $escaped_from = htmlspecialchars($_POST['email']);

    date_default_timezone_set('Etc/UTC');

    // email via PHP
    require './PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    /* Server Configuration */
    $mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
    $mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
    $mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
    $mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
    $mail->Username = "sharefoodbcit@gmail.com"; // Your Gmail address.
    $mail->Password = "comp2910"; // Your Gmail login password or App Specific Password.


    $mail->setFrom($escaped_from, 'Share Food'); // Set the sender of the message.
    $mail->AddReplyTo($escaped_from);
    $mail->addAddress('sharefoodbcit@gmail.com', ''); // Set the recipient of the message.
    $mail->Subject = $escaped_subject; // The subject of the message.

    /* Message Content - Choose simple text or HTML email */

    // Choose to send either a simple text email...
    $mail->Body = "Sent from: $escaped_from \n\n" . $escaped_msg; // Set a plain text body.

    if ($mail->send()) {
        echo "<script>alert ('Message has been sent successfully');
        window.location.replace('index.php');</script>";
    } else {
        echo "Sorry, there's problem in the mail server.<br>
        <a href='contact.php'>Go back</a>";

    }
}

 ?>
