<?php
require './db.php';
require './alert.php';
$id = $_POST['id_hidden_modify_resident'];
$name = $_POST['name_modify_resident'];
$firstname = $_POST['firstname_modify_resident'];
$email = $_POST['email_modify_resident'];
$nationality = $_POST['nationality_modify_resident'];
$date_of_birth = $_POST['dob_modify_resident'];
$gender = $_POST['gender_modify_resident'];
$stib = $_POST['stib_modify_resident'];



$sql = 'UPDATE users SET name="' . $name . '", first_name="' . $firstname . '", email="' . $email . '", nationality="' . $nationality . '", date_of_birth="' . $date_of_birth . '", gender="' . $gender . '", stib="' . $stib . '" WHERE id="' . $id . '"';

$req = mysqli_query($db, $sql);
if ($req) {
    success('Le résident a été modifié.');
} else {
    error('Erreur lors de la modification du résident.');
}
