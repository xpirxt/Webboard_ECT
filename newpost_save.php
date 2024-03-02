<?php
session_start();
if (isset($_POST['topic'])) {
    $cat_id = $_POST['category'];
    $user_id = $_SESSION['user_id'];  // ใช้ session ในการระบุผู้ใช้
    $topic = $_POST['topic'];
    $comment = $_POST['comment'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "INSERT INTO post (title,content,post_date,cat_id,user_id) VALUES ('$topic', '$comment', NOW(), '$cat_id', '$user_id')";
    $conn->exec($sql);
    $conn = null;
    header("Location:index.php");
    die();
} else {
    header("Location:index.php");
    die();
}
