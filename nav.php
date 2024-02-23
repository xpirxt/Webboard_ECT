<nav class="navbar navbar-expand-lg" style="background-color: #a4a4a4;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house-exclamation-fill"></i>HOME</a>
        <ul class="navbar-nav">
            <?php if (!isset($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login.php"><i class="bi bi-pencil-square"></i>เข้าสู่ระบบ</a>
                </li>
            <?php } else { ?>
                <li class="nav-item dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill-exclamation"></i><?php echo $_SESSION['username'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>