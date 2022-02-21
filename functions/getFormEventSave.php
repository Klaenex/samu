<?php

require './db.php';
require './alert.php';

$id = $_POST['id'];


$sql = "SELECT * FROM `events` WHERE `id` = '$id'";
$req = mysqli_query($db, $sql);
$event = mysqli_fetch_assoc($req);
$sql = "SELECT * FROM `event_images` WHERE `event_id` = '$id'";
$req = mysqli_query($db, $sql);
$eventImg = mysqli_fetch_assoc($req);

$jsonData = [
    'event' => $event,
    'eventImg' => $eventImg
];
echo json_encode($jsonData);
