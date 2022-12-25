<?php require_once "dbconn.php" ?>
<?php include "modul/head.php" ?>
<?php

    if(isset($_POST['submit'])){
        $validno = true;
        if(empty($_POST['ime']) or strlen($_POST['ime'])<3){
            $validno = false;
            // echo "ime";
        }
        if(empty($_POST['prezime']) or strlen($_POST['prezime'])<3){
            $validno = false;
            // echo "prezime";
        }
        if(empty($_POST['predmet']) or ($_POST['predmet']!='PWA' and $_POST['predmet']!='IS' and $_POST['predmet']!='OIT')){
            $validno = false;
            // echo "predmet";
        }
        if(!$validno){
            echo "Prijavni obrazac nije ispravno popunjen";
        }else{
            $pdo->prepare("INSERT INTO studenti VALUES (null,?,?,?,?,?)")->execute([$_POST['ime'], $_POST['prezime'], $_POST['predmet'], '', '']);
            echo "Prijava je prihvacena";
        }
    }

?>
<form method="post" action="prijava.php">
    <label>Ime:</label>
    <input type="text" name="ime">
    <br>
    <label>Prezime:</label>
    <input type="text" name="prezime">
    <br>
    <label>Predmet:</label>
    <select name="predmet">
        <option value="PWA">PWA</option>
        <option value="IS">IS</option>
        <option value="OIT">OIT</option>
    </select>
    <br>
    <input type="submit" name="submit" value="submit">
    <br>
</form>
<?php include "modul/foot.php" ?>