<?php
require './alert.php';
require './db.php';
require '../config.php';


$imgHidden = $_POST['img_hidden_modify_event'];


$name = htmlspecialchars($_POST['name_modify_event']);
$description = htmlspecialchars($_POST['description_modify_event']);
$place = htmlspecialchars($_POST['place_modify_event']);
$date = htmlspecialchars($_POST['date_modify_event']);
$time = htmlspecialchars($_POST['time_modify_event']);
$ageMin = htmlspecialchars($_POST['age_min_modify_event']);
$ageMax = htmlspecialchars($_POST['age_max_modify_event']);

if (isset($_POST['art_27_modify_event'])) {
    $art27 = 1;
} else {
    $art27 = 0;
}

$id = $_POST['id_hidden_modify_event'];

if (!empty($name) && !empty($description) && !empty($ageMin) && !empty($ageMax)) {
    $sql = "UPDATE events SET name='$name', description='$description', place='$place', date='$date', time='$time', age_min='$ageMin', age_max='$ageMax', art_27='$art27' WHERE id='$id'";
    $req = mysqli_query($db, $sql);
    if ($req) {
        if ($_FILES['img_modify_event']['name'] != '') {
            $fileName = $_FILES['img_modify_event']['name'];
            $fileTmpName = $_FILES['img_modify_event']['tmp_name'];
            $fileSize = $_FILES['img_modify_event']['size'];
            if ($fileSize >= 10000000) {
                die(error('Le fichier est trop volumineux'));
            }
            $sql = "UPDATE event_images SET img_name='$fileName' WHERE event_id='$id'";
            $req = mysqli_query($db, $sql);
            if ($req) {
                $folder = SITE_ROOT . '/images/events/' . $fileName;
                move_uploaded_file($fileTmpName, $folder);
                success('L\'événement a bien été modifié');
            } else {
                die(error('Une erreur est survenue lors de la modification de l\'image'));
            }
        } else {
            success('L\'événement a bien été modifié');
        }
    } else {
        die(error('Une erreur est survenue lors de la modification de l\'événement'));
    }
} else {
    error('Veuillez remplir tous les champs');
}
