<?php

require './db.php';
session_start();
$id = $_POST['id'];
$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
$req = mysqli_query($db, $sql);
$user = mysqli_fetch_assoc($req);
$jsonData = [
    'user' => $user
];
echo json_encode($jsonData);
