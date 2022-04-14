<?php
require './emailFunctions.php';
require './db.php';
require './alert.php';
$email = filter_var($_POST['modify_password_email'], FILTER_SANITIZE_EMAIL);
$sql = "SELECT id FROM users WHERE email='$email'";
$req = mysqli_query($db, $sql);
$user = mysqli_fetch_assoc($req);
if ($user) {
    emailNewPassword($email, $user['id'], $db);
    success('Un email vous a été envoyé pour modifier votre mot de passe');
} else {
    error('Cet email n\'existe pas');
}
