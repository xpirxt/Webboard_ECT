<?php
session_start();
$user_id = $_SESSION['user_id'];
$comment = $_POST['comment'];
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
$sql = "INSERT INTO comment (content,post_date,user_id,post_id) 
            VALUES ('$comment',NOW(),$user_id,$_POST[post_id])";
$conn->exec($sql);
$conn = null;
header("location:index.php");
header("location:post.php?id=$_POST[post_id]");
