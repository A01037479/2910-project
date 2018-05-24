<?php

if(count($_POST) == 0) {
    header("Location: index.php");
    exit;
} else {
    require_once('lib/connect.php');
    require_once('config/config.php');
    $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); // prevent sql input by user
    $sql = "SELECT * FROM list WHERE id = {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $escaped_email = htmlspecialchars($row['email']);
    $escaped_msg = htmlspecialchars($_POST['message']);
    $escaped_from = htmlspecialchars($_POST['email']);

    $row = mysqli_fetch_array($result);

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
    $mail->addAddress($escaped_email, ''); // Set the recipient of the message.
    $mail->Subject = 'A new request from Share Food'; // The subject of the message.

    /* Message Content - Choose simple text or HTML email */

    // Choose to send either a simple text email...
    $mail->Body = "<img src='http://sharefood.today/img/logoFull.png' width='250'><p>Sent from: $escaped_from</p>
    <p>$escaped_msg</p>
    <p><a href='http://sharefood.today/detail.php?id=$filtered_id' target='_blank'>Click to check the item</a></p>"; // Set a plain text body.
    
    $mail->IsHTML(true);

    if ($mail->send()) {
        echo "<script>alert ('Message has been sent successfully');
        window.location.replace('index.php');</script>";
    } else {
        echo "Sorry, there's problem in the mail server.<br>
        <a href='email_process.php?id={$filtered_id}'>Go back</a>";

    }
}

 ?>
