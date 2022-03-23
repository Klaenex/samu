<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if (!isset($user['role'])) {
        require './functions/pagesUser.php';
    } else {
        $userRole = $_SESSION['user']['role'];
        switch ($userRole) {
            case '1':
                require './functions/pagesSuperAdmin.php';
                break;
            case '0':
                require './functions/pagesAdmin.php';
                break;
        }
    }
} else {
    require './functions/pagesPasswordRecovery.php';
}
