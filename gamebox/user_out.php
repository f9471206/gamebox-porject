<?php

if (isset($_POST['out'])) {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['userId']);
    unset($_SESSION['userlevel']);

    $text = true;
    echo json_encode($text);

}
