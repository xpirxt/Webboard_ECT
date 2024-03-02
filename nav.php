<nav class="navbar navbar-expand-sm" style="background-color: #d3d3d3;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
        <ul class="navbar-nav">
            <?php if (!isset($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login.php"> <i class="bi bi-pencil-square"></i> เข้าสู่ระบบ</a>
                </li>
            <?php } else { ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> <?php echo $_SESSION['name'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php"> <i class="bi bi-power"></i> ออกจากระบบ</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>