<?php
require './alert.php';
require './db.php';
require '../config.php';
session_start();



$imgHidden = $_POST['img_hidden_add_event'];
if ($imgHidden != '') {
    $fileName = $imgHidden;
} else {
    $fileName = $_FILES['img_add_event']['name'];
    $fileTmpName = $_FILES['img_add_event']['tmp_name'];
    $fileSize = $_FILES['img_add_event']['size'];
    if ($fileName == "") {
        die(error('Veuillez choisir une image'));
    }
    if ($fileSize >= 10000000) {
        die(error('Le fichier est trop volumineux'));
    }
}







$folder = SITE_ROOT . '/images/events/' . $fileName;

$name = htmlspecialchars($_POST['name_add_event']);
$description = htmlspecialchars($_POST['description_add_event']);
$place = htmlspecialchars($_POST['place_add_event']);
$date = htmlspecialchars($_POST['date_add_event']);
$time = htmlspecialchars($_POST['time_add_event']);
$ageMin = htmlspecialchars($_POST['age_min_add_event']);
$ageMax = htmlspecialchars($_POST['age_max_add_event']);

if (isset($_POST['art_27_add_event'])) {
    $art27 = 1;
} else {
    $art27 = 0;
}

if (isset($_POST['save_event'])) {
    $save = 1;
} else {
    $save = 0;
}

$center = $_SESSION['user']['center'];

if (!empty($name) && !empty($description) && !empty($ageMin) && !empty($ageMax)) {
    $sql = "INSERT INTO events (name, description, place,date, time, age_min, age_max, art_27, center) VALUES ('$name', '$description','$place', '$date', '$time', '$ageMin', '$ageMax', '$art27','$center')";
    $req = mysqli_query($db, $sql);
    if ($req) {
        $sql = "SELECT MAX(id) FROM events";
        $req = mysqli_query($db, $sql);
        $event = mysqli_fetch_assoc($req);
        $eventId = $event['MAX(id)'];
        if ($eventId) {
            $sql = "INSERT INTO event_images (event_id, img_name) VALUES ('$eventId', '$fileName')";
            $req = mysqli_query($db, $sql);
            if ($req) {
                success('Evénement ajouté');
                if ($imgHidden == '') {
                    move_uploaded_file($fileTmpName, $folder);

                    if ($save == 1) {
                        $sql = "INSERT INTO event_saves (event_id) VALUES ('$eventId')";
                        $req = mysqli_query($db, $sql);
                        if (!$req) {
                            error('Erreur lors de la sauvegarde');
                        }
                    }
                }
            } else {
                error('Erreur lors de l\'ajout de l\'image');
            }
        }
    } else {
        error('Erreur lors de l\'ajout de l\'évènement');
    }
} else {
    error('Veuillez remplir tous les champs');
}
