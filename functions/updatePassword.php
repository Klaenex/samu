<?php
require './db.php';
require './alert.php';
session_start();
$token = $_POST['token'];
$password = $_POST['password_page'];
$password_confirm = $_POST['password_page_confirm'];



$sql = 'SELECT user_id FROM new_password WHERE token="' . $token . '"';

$req = mysqli_query($db, $sql);
$idUser = mysqli_fetch_assoc($req);

if ($idUser) {
    if ($password == $password_confirm) {
        $sql = 'UPDATE users SET password="' . hash('sha256', $password) . '" WHERE id="' . $idUser['user_id'] . '"';
        $req = mysqli_query($db, $sql);
        $sql = 'DELETE FROM new_password WHERE token="' . $token . '"';
        $req = mysqli_query($db, $sql);


        $sql = 'SELECT * FROM users WHERE id="' . $idUser['user_id'] . '"';
        $req = mysqli_query($db, $sql);
        $user = mysqli_fetch_assoc($req);
        $_SESSION['user'] = $user;
        success('Votre mot de passe a bien été modifié');
    } else {
        error('Les mots de passe ne correspondent pas');
    }
}
