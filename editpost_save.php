<?php
if (isset($_POST['postid'])) {
    session_start();
    $user_id = $_SESSION['user_id'];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "UPDATE post SET title='$_POST[topic]',content='$_POST[comment]',post_date=NOW() WHERE id = $_POST[postid]";
    $conn->query($sql);
    $_SESSION['add_post'] = "success";
    $conn = null;
    header("location:editpost.php?postid=$_POST[postid]");
    die();
} else {
    header("location:index.php");
    die();
}
