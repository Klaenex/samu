<?php
require './db.php';
session_start();
$center = $_SESSION['user']['center'];

$sql = "SELECT * FROM `users` WHERE `center` = '$center'";
$req = mysqli_query($db, $sql);
$users = mysqli_fetch_all($req, MYSQLI_ASSOC);
$jsonResponse = (['users' => $users]);
echo json_encode($jsonResponse);
