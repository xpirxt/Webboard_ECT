<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">Webboard KakKak</h1>
    <hr>
    <div style="text-align: center;">
        <?php
        $login = $_POST["login"];
        $password = $_POST['password'];
        if($login == "admin" && $password == "ad1234"){
            $_SESSION['username']='admin';
            $_SESSION['role']='a';
            $_SESSION['id']='session_id()';

            echo "ยินดีต้อนรับคุณ ADMIN";
        }
        elseif($login == "member" && $password == "mem1234"){
            $_SESSION['username']='member';
            $_SESSION['role']='m';
            $_SESSION['id']='session_id()';

            echo "ยินดีต้อนรับคุณ MEMBER";
        }
        else{
            echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
        }
    ?>
    </div>
    <div style="text-align: center;">
        <a href="index.php">กลับไปหน้าหลัก</a>
        </div>
</body>
</html>