<?php
require './alert.php';
require './db.php';
require './emailFunctions.php';
session_start();
$email = filter_var($_POST['email_add_resident'], FILTER_SANITIZE_EMAIL);
$name = htmlspecialchars($_POST['name_add_resident']);
$firstName = htmlspecialchars($_POST['firstname_add_resident']);
$nationality = htmlspecialchars($_POST['nationality_add_resident']);
$date_of_birth = $_POST['dob_add_resident'];
$gender = htmlspecialchars($_POST['gender_add_resident']);
$stib = htmlspecialchars($_POST['stib_add_resident']);


// $sql = "select * from users where email='$email'";
// $req = mysqli_query($db, $sql);
// $user = mysqli_fetch_assoc($req);
// if ($user) {
//     error('Cet email est déjà utilisé');
// } else {

$center = $_SESSION['user']['center'];
$sql = "INSERT INTO users (name, first_name, nationality, email, date_of_birth, gender, stib,center) VALUES ('$name', '$firstName', '$nationality', '$email', '$date_of_birth', '$gender', '$stib','$center')";
$req = mysqli_query($db, $sql);
if ($req) {
    $sql = "SELECT MAX(id) FROM users";
    $req = mysqli_query($db, $sql);
    $id = mysqli_fetch_assoc($req);
    if ($req) {
        emailNewPassword($email, $id['MAX(id)'], $db);
        success('Résidents ajouté, un email lui a été envoyé pour lui créer un mot de passe');
    }
} else {
    error("Erreur lors de l'ajout du résident");
} 
        // }
