<?php require_once "dbconn.php" ?>
<?php include "modul/head.php" ?>
<?php 
    if(isset($_POST['submit'])){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=? AND `password`=?");
        $stmt->execute([$_POST['username'], $_POST['password']]);
        $user = $stmt->fetch();
        if($user){
            session_start();
            $_SESSION['user'] = $user;
            header("Location: prijave.php");
        }else{
            echo "Login failed";
        }
    }
?>
<form method="post" action="login.php">
    <label>Username :</label>
    <input type="text" name="username">
    <br>
    <label>Password:</label>
    <input type="password" name="password">
    <br>
    <input type="submit" name="submit" value="submit">
    <br>
</form>
<?php include "modul/foot.php" ?>