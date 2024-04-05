<?php
if (isset($_POST['cat_name'])) {
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "INSERT INTO `category` (`name`)
                    VALUES ('$_POST[cat_name]')";
    $conn->exec($sql);
    $conn = null;
    $_SESSION['add_cat'] = "success";
    header("location:category.php");
    die();
}
