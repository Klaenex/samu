<?php
require './db.php';
require './alert.php';
session_start();

$idEvent = $_POST['id'];
$idUser = $_SESSION['user']['id'];

$sql = "SELECT * FROM event_subscribers WHERE event_id = $idEvent AND user_id = $idUser";

$req = mysqli_query($db, $sql);
print_r(mysqli_error($db));

$subscribed = mysqli_fetch_assoc($req);

if (!$subscribed) {
    $sql = "INSERT INTO `event_subscribers` (`event_id`, `user_id`) VALUES ('$idEvent', '$idUser')";
    $req = mysqli_query($db, $sql);
    success('Vous êtes maintenant inscrit à cet événement');
} else {
    $sql = "DELETE FROM `event_subscribers` WHERE `event_subscribers`.`event_id` = $idEvent AND `event_subscribers`.`user_id` = $idUser";
    $req = mysqli_query($db, $sql);
    error('Vous êtes maintenant désinscrit de cet événement');
}
