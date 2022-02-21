<?php

function error($msg)
{
    echo json_encode(array(
        'error' => $msg
    ));
}
function success($msg)
{
    echo json_encode(array(
        'success' => $msg
    ));
}
