<?php session_start();
if (!isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align:center ;" class="mt-3">Webboard apirat</h1>
        <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php
                if (isset($_SESSION['add_post'])) {
                    if ($_SESSION['add_post'] == "success") {
                        echo "<div class='alert alert-success'>
                        แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                    }
                    unset($_SESSION['add_post']);
                }
                ?>
                <div class="card border-warning">
                    <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
                    <div class="card-body">
                        <form action="editpost_save.php" method="post">
                            <div class="row">
                                <label class="col-lg-3 col-form-label">หมวดหมู่:</label>
                                <div class="col-lg-9">
                                    <select name="category" class="form-select">
                                        <?php
                                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                        $sql = "SELECT category.id,category.name,post.title,post.content,user.id FROM post
                                                INNER JOIN user ON (post.user_id=user.id)
                                                INNER JOIN category ON (post.cat_id=category.id) WHERE post.id = $_GET[postid]";
                                        foreach ($conn->query($sql) as $row) {
                                            if ($row[4] != $_SESSION['user_id']) {
                                                header("location:index.php");
                                                $conn = null;
                                                die();
                                            }
                                            echo "<option value=$row[0]>$row[1]</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">หัวข้อ:</label>
                                <div class="col-lg-9">
                                    <?php
                                            echo "<input type=hidden name=postid value=$_GET[postid]>";
                                            echo "<input type=text name=topic class='form-control' value=$row[2] required>";
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 col-form-label">เนื้อหา:</label>
                                <div class="col-lg-9">
                                    <?php
                                            echo "<textarea name=comment row=8 class='form-control' required>$row[3]</textarea>";
                                    ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning btn-sm text-white me-2">
                                        <i class="bi bi-caret-right-square"></i> บันทึกข้อความ</button>
                                </div>
                            </div>
                        <?php
                                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div><br>
</body>