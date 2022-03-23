<?php
if (!isset($_SESSION['user'])) {
    require './templates/components/mainDisconnected.php';
} else {
    $user = $_SESSION['user'];
    if (!isset($user['role'])) {
        require './functions/displayEventResident.php';
    } else {
        switch ($user['role']) {
            case '0':
                require './functions/displayEventAdmin.php';
                break;
            case '1':
                require './functions/displayEventSuperAdmin.php';
                break;
        }
    }
}
