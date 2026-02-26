<?php
    session_start();

    $_SESSION['user'] = 'joão';
    header('Location: welcome.php');
    exit();
?>
