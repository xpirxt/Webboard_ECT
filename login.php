<?php
session_start();
if (isset($_SESSION['id'])) {
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
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        function showpwd() {
            let x = document.getElementById("pass");
            let show = document.getElementById("show_eye");
            let hide = document.getElementById("hidden_eye");
            hide.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show.classList.add("d-none");
            } else {
                x.type = "password";
                show.classList.remove("d-none");
                hide.classList.add("d-none");
            }
        }
    </script>
</head>

<body>
    <div class="container-lg">
        <h1 style="text-align:center;" class="mt-3">Webboard apirat</h1>
        <?php include "nav.php" ?>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
            <div class="col-lg-4 col-md-6 col-sm-8 col-10">
                <?php if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']); ?>
                    <div class="alert alert-danger" role="alert">
                        ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-header">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                            <div class="form-group">
                                <label for="user" class="form-label">Login:</label>
                                <input type="text" id="user" class="form-control" name="login" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pass" class="form-label">Password:</label>
                                <div class="input-group">
                                    <input type="password" id="pass" class="form-control" name="pwd" required>
                                    <span class="input-group-text" onclick="showpwd()">
                                        <i class="bi bi-eye-fill" id="show_eye"></i>
                                        <i class="bi bi-eye-slash-fill d-none" id="hidden_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-secondary btn-sm me-1">Login</button>
                                <button type="reset" class="btn btn-danger btn-sm ms-1">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <center class="mt-2">ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></center>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
        </div>
    </div>
</body>

</html>