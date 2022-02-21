<?php
session_start();
require './db.php';
require './alert.php';



$email = htmlspecialchars($_POST['email_login']);
$password = htmlspecialchars($_POST['password_login']);
$password = hash('sha256', $password);


if ($email !== '') {
    if ($password !== '') {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $req = mysqli_query($db, $sql);
        if (mysqli_num_rows($req) > 0) {
            $user = mysqli_fetch_assoc($req);
            $_SESSION['user'] = $user;
        } else {
            error('Email ou mot de passe incorrect');
        }
    }
} else {
    error('Veuillez remplir tous les champs');
}
