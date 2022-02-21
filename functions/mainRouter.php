<?php
if (!isset($_SESSION['user'])) {
    require('./templates/components/mainDisconnected.php');
} else {
    echo 'admin/membre';
}
