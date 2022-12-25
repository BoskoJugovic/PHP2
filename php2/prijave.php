<?php require_once "dbconn.php" ?>
<?php include "modul/head.php" ?>
<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        http_response_code(401); die();
    }
    $sudenti = $pdo->query("SELECT * FROM studenti")->fetchAll();

    foreach($sudenti as $student){ ?>
        <a href="unos-bodova.php?id=<?= $student['id'] ?>"><?= $student['ime'] . ' ' . $student['prezime'] ?></a>
    <?php } ?>

<?php include "modul/foot.php" ?>