<?php
if (!isset($_SESSION['user'])) {
    require('./templates/components/mainDisconnected.php');
} else {
    require_once './config.php';
    echo SITE_INDEX;
}
