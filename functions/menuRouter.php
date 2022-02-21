<?php
require './templates/components/menu.php';
if (!isset($_SESSION['user'])) {
    require './templates/components/navLoginResidents.php';
} else {
    $user = $_SESSION['user'];
    if (!isset($user['role'])) {
        require './templates/components/navLogedResidents.php';
    } else {
        switch ($user['role']) {
            case '1':
                require './templates/components/navSuperAdmin.php';
                break;
            case '0':
                require './templates/components/navAdmin.php';
                break;
        }
    }
}
