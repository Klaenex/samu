<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

require_once('../config.php');



function emailNewPassword($email, $userId, $db)
{
    $token = uniqid(sha1(time()));
    $sql = "INSERT INTO new_password (user_id, token ) VALUES ('$userId','$token')";
    $req = mysqli_query($db, $sql);
    echo (mysqli_error($db));
    if ($req) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->SMTPDebug  = 0;
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "klaenex.29@gmail.com";
            $mail->Password   = GMAIL_PASSWORD;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('klaenex.29@gmail.com', 'Event samu');
            $mail->addAddress($email);     // Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Choisir votre mot de passe';
            $mail->Body    = '<p>Veuillez cliquer sur le lien pour choisir votre mot de passe</p>
     <a href="http://localhost:3000/samu-new/create_password.php?token=' . $token . '">Choisir votre mot de passe</a>';


            $mail->AltBody = 'Veuillez cliquer sur le lien pour choisir votre mot de passe http://localhost:3000/samu-new/create_password.php?token=' . $token;

            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
