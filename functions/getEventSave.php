<?php
require './db.php';
session_start();
$sql = "SELECT * FROM `event_saves`";
$req = mysqli_query($db, $sql);
$events = mysqli_fetch_all($req, MYSQLI_ASSOC);
$eventSaveId = [];

foreach ($events as $key => $data) {

    $sql = "SELECT * FROM `events` WHERE `id` = '$data[event_id]'";
    $req = mysqli_query($db, $sql);
    $event = mysqli_fetch_assoc($req);
    array_push($eventSaveId, $data['event_id']);
}




$jsonData = [];
$center = $_SESSION['user']['center'];
foreach ($eventSaveId as $key => $data) {
    $sql = "SELECT * FROM `events` WHERE `id` = '$data' and `center` = '$center'";
    $req = mysqli_query($db, $sql);
    $event = mysqli_fetch_assoc($req);
    array_push($jsonData, $event);
}

echo json_encode($jsonData);
