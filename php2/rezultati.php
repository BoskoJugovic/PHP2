<?php require_once "dbconn.php" ?>
<?php include "modul/head.php" ?>
<?php
    $studenti = $pdo->query("SELECT * FROM studenti ORDER BY bodovi DESC")->fetchAll();
?>
<table>
    <thead>
        <tr>
            <td><b>Ime i prezime</b></td>
            <td><b>Broj bodova</b></td>
            <td><b>Ocena</b></td>
            <td><b>
                <form>
                    <select>
                        <option value="PWA">PWA</option>
                        <option value="IS">IS</option>
                        <option value="OIT">OIT</option>
                    </select>
                    <button><a href="rezultati.php?ispit=<?= $student['predmet'] ?>">Prikazi</a></button>
                </form>
            </b></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($studenti as $student){ ?>
        <tr>
            <td><?= $student['ime'] . ' ' . $student['prezime'] ?></td>
            <td><?= $student['bodovi'] ?></td>
            <td><?php
            if($student['izasao']){
                if($student['bodovi']<50){
                    echo "5";
                }elseif($student['bodovi']>=50 and $student['bodovi']<60){
                    echo "6";
                }elseif($student['bodovi']>=60 and $student['bodovi']<70){
                    echo "7";
                }elseif($student['bodovi']>=70 and $student['bodovi']<80){
                    echo "8";
                }elseif($student['bodovi']>=80 and $student['bodovi']<90){
                    echo "9";
                }else{
                    echo "10";
                }
            }else{
                echo "Nije izasao";
            }
            ?></td>
        </tr>
        <?php } ?>
    <tbody>
</tabel>
<?php include "modul/foot.php" ?>