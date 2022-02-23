<?php

require_once('../config.php');



function emailNewPassword($email, $userId, $db)
{
    $uniqId = uniqid(sha1(time()));
    // $to = $email;
    // $subject = 'Création de votre mot de passe';
    // $message = 'Veuillez cliquer sur le lien suivant pour créer votre mot de passe: </br></br> <a href="http://localhost:' . $_SERVER['SERVER_PORT'] . '/samu-new/create-password.php?emailId=' . $uniqId . '">Créer un mot de passe</a>';
    // $headers = 'From:klaenex.29@gmail.com';

    // $sql = "INSERT INTO `new_password` (`user_id`, `token`) VALUES ('$userId', '$uniqId')";
    // $req = mysqli_query($db, $sql);
    $to = "hello@cuozzovincenzo.be";
    $subject = "HTML email";

    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>
    <tr>
    <td>John</td>
    <td>Doe</td>
    </tr>
    </table>
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@example.com>' . "\r\n";
    $headers .= 'Cc: myboss@example.com' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "The email message was sent.";
    } else {
        echo "The email message was not sent.";
    }
    // if ($req) {
    //     echo ('ok');
    //     mail($to, $subject, $message, $headers);
    // }




    //mail($to, $subject, $message, $headers);
}
