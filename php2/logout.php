<?php require_once "dbconn.php" ?>
<?php include "modul/head.php" ?>\
<?php 
    session_start();
    session_destroy();
    die();
?>
<?php include "modul/foot.php" ?>