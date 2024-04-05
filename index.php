<?php
session_start();
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
    <script>
        function myfunction() {
            let s = confirm("ต้้องการจะลบจริงหรือไม่");
            return s;
        }
    </script>
</head>

<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard apirat</h1>
        <hr>
        <?php include "nav.php"; ?>
        <div class="mt-3 mb-3 d-flex justify-content-between">
            <div>
                <lebel>หมวดหมู่ :</lebel>
                <span class="dropdown">
                    <?php
                    if (isset($_GET['catid'])) {
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category WHERE category.id = $_GET[catid]";
                        foreach ($conn->query($sql) as $row) {
                            echo "<button type=button class='btn btn-light btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded=false>
                                --$row[name]--</button>";
                        }
                        $conn = null;
                    } else {
                        echo "<button type=button class='btn btn-light btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded=false>
                            --ทั้งหมด--</button>";
                    }
                    ?>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php">ทั้งหมด</a></li>
                        <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category";
                        foreach ($conn->query($sql) as $row) {
                            echo "<li><a class=dropdown-item href=index.php?catid=$row[id]>$row[name]</a></li>";
                        }
                        $conn = null;
                        ?>
                    </ul>
                </span>
            </div>
            <?php if (isset($_SESSION['id'])) { ?>
                <div><a href="newpost.php" class="btn btn-success btn-sm">
                        <i class="bi bi-plus"></i>สร้างกระทู้ใหม่
                    </a></div>
            <?php } ?>
        </div>
        <table class="table table-striped">
            <?php
            if (isset($_GET['catid'])) {
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date,t2.id,t1.user_id FROM post as t1
                INNER JOIN user as t2 ON (t1.user_id=t2.id)
                INNER JOIN category as t3 ON(t1.cat_id=t3.id) WHERE t3.id = $_GET[catid] ORDER BY t1.post_date DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    echo "<tr><td class='d-flex justify-content-between'>
                    <div>[ $row[0] ]<a href=post.php?id=$row[2] style=text-decoration:none> $row[1]</a><br>$row[3] - $row[4]</div>";
                    if (isset($_SESSION['id']) && $row[6] == $_SESSION['user_id']) {
                        echo "<div class='me-2 align-self-center'>
                        <a href=editpost.php?postid=$row[2] class='btn btn-warning btn-sm me-1'><i class='bi bi-pencil-fill'></i></a>
                        <a href=delete.php?id=$row[2] class='btn btn-danger btn-sm' onclick='return myfunction()'><i class='bi bi-trash'></i></a></div>";
                    } else if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
                        echo "<div class='me-2 align-self-center'>
                        <a href=delete.php?id=$row[2] class='btn btn-danger btn-sm' onclick='return myfunction()'><i class='bi bi-trash'></i></a></div>";
                    } else if (isset($_SESSION['id']) && $row[6] == $_SESSION['user_id']) {
                        echo "<div class='me-2 align-self-center'>
                        <a href=editpost.php?postid=$row[2] class='btn btn-warning btn-sm me-1'><i class='bi bi-pencil-fill'></i></a>
                        <a href=delete.php?id=$row[2] class='btn btn-danger btn-sm' onclick='return myfunction()'><i class='bi bi-trash'></i></a></div>";
                    }
                }
            } else {
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date,t2.id,t1.user_id FROM post as t1
                INNER JOIN user as t2 ON (t1.user_id=t2.id)
                INNER JOIN category as t3 ON(t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    echo "<tr><td class='d-flex justify-content-between'>
                    <div>[ $row[0] ]<a href=post.php?id=$row[2] style=text-decoration:none> $row[1]</a><br>$row[3] - $row[4]</div>";
                    if (isset($_SESSION['id']) && $row[6] == $_SESSION['user_id']) {
                        echo "<div class='me-2 align-self-center'>
                        <a href=editpost.php?postid=$row[2] class='btn btn-warning btn-sm me-1'><i class='bi bi-pencil-fill'></i></a>
                        <a href=delete.php?id=$row[2] class='btn btn-danger btn-sm' onclick='return myfunction()'><i class='bi bi-trash'></i></a></div>";
                    } else if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
                        echo "<div class='me-2 align-self-center'>
                        <a href=delete.php?id=$row[2] class='btn btn-danger btn-sm' onclick='return myfunction()'><i class='bi bi-trash'></i></a></div>";
                    } else if (isset($_SESSION['id']) && $row[6] == $_SESSION['user_id']) {
                        echo "<div class='me-2 align-self-center'>
                        <a href=editpost.php?postid=$row[2] class='btn btn-warning btn-sm me-1'><i class='bi bi-pencil-fill'></i></a>
                        <a href=delete.php?id=$row[2] class='btn btn-danger btn-sm' onclick='return myfunction()'><i class='bi bi-trash'></i></a></div>";
                    }
                }
            }
            ?>
        </table>
    </div>
</body>

</html>