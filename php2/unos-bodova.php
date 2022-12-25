<?php require_once "dbconn.php" ?>
<?php include "modul/head.php" ?>
<?php 
    $id = $_REQUEST['id'];
    if(isset($_POST['submit'])){
        $validno = true;
        if(empty($_POST['bodovi']) or !($_POST['bodovi']>='0' and $_POST['bodovi']<='100')){
           $validno = false;
        }
        if(empty($_POST['izasao'])){
            $izasao = 0;
        }else{
            $izasao = 1;
        }
        if(!$validno){
            echo "Broj bodova nije dobar.";
        }else{
            $stmt = $pdo->prepare("UPDATE studenti SET izasao=?, bodovi=? WHERE id=?");
            $stmt->execute([$izasao, $_POST['bodovi'], $id]);
            header("Location: prijave.php");
        }
    }
    $student = $pdo->query("SELECT * FROM studenti WHERE id=$id")->fetch();
?>
<h2><?= $student['ime'] . ' ' . $student['prezime'] . ' ' . $student['predmet'] ?></h2>
<form method="post" action="unos-bodova.php?id=<?= $id ?>">
    <label>Broj bodova :</label>
    <input type="text" name="bodovi">
    <br>
    <label>Izasao:</label>
    <input type="checkbox" name="izasao" <?php if($student['izasao']){?> checked <?php }?> >
    <br>
    <input type="submit" name="submit" value="submit">
    <br>
</form>
<?php include "modul/foot.php" ?>