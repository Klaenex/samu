<?php
session_start();
require './functions/db.php';
require_once './config.php';
if (!isset($_SESSION['user'])) {
    if (isset($_GET['code'])) {
        $url = 'https://oauth2.googleapis.com/token';
        $data = array(
            'code' => $_GET['code'],
            'client_id' => GOOGLE_ID,
            'client_secret' => GOOGLE_SECRET,
            'redirect_uri' => 'http://localhost:8080/samu-new/',
            'grant_type' => 'authorization_code'
        );
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        if (!$response) {
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        } else {
            $response = json_decode($response);
            $access_token = $response->access_token;
            $url = 'https://openidconnect.googleapis.com/v1/userinfo?access_token=' . $access_token;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $response = json_decode($response);
            $email = $response->email;
            $sql = "SELECT * FROM `users_admin` WHERE `email` = '$email'";
            $req = mysqli_query($db, $sql);
            echo mysqli_num_rows($req);
            if (mysqli_num_rows($req) > 0) {
                $user = mysqli_fetch_assoc($req);
                $_SESSION['user'] = $user;
            }
        }
    }
}
