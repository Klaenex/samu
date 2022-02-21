<?php
require './db.php';
session_start();
$center = $_SESSION['user']['center'];

$sql = "SELECT * FROM `events` WHERE `center` = '$center'";
$req = mysqli_query($db, $sql);
$events = mysqli_fetch_all($req, MYSQLI_ASSOC);
$jsonResponse = (['events' => $events]);
echo json_encode($jsonResponse);
