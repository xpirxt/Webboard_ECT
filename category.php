<?php
session_start();
if ($_SESSION['role'] != 'a') {
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
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>

            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php
                if (isset($_SESSION['add_cat'])) {
                    if ($_SESSION['add_cat'] == "success") {
                        echo "<div class='alert alert-success'>
                        แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                    }
                    unset($_SESSION['add_cat']);
                }
                ?>
                <div class="mt-3 mb-3 d-flex justify-content-between text-center">
                    <table class="table table-striped">
                        <?php
                        $i = 1;
                        echo "<tr><th>ลำดับ</th>
                                      <th>ชือหมวดหมู่</th>
                                      <th>จัดการ</th></tr>";
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category";
                        foreach ($conn->query($sql) as $row) {
                            echo "<tr><td>$i</td>
                                          <td>$row[name]</td>
                                          <td><a href=# class='btn btn-warning btn-sm me-1'><i class='bi bi-pencil-fill'></i></a>
                                              <a href=# class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></a></td></tr>";
                            $i += 1;
                        }
                        ?>
                    </table>
                </div>
                <center>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่ใหม่
                    </button>
                </center>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="category_save.php" method="post">
                                    <div class="row mb-3">
                                        <label class="col-form-label">ชื่อหมวดหมู่:</label>
                                        <div class="">
                                            <input type="text" name="cat_name" class="form-control" required>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-1"></div>
            </div>
        </div>
</body>

</html>