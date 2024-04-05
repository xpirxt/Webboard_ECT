<nav class="navbar navbar-expand-lg" style="background-color: #d3d3d3;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php
                if (!isset($_SESSION['id'])) { ?>
                    <a class="nav-link" aria-current="page" href="login.php"><i class="bi bi-pencil-square"></i> เข้าสู่ระบบ</a>
                <?php } else { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn btn-outline-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people-fill"></i> <?php echo "$_SESSION[username]" ?>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    if ($_SESSION['role'] == 'a') {
                    ?>
                        <li><a class="dropdown-item" href="category.php"><i class="bi bi-bookmarks"></i> จัดการหมวดหมู่</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-check"></i> จัดการผู้ใช้งาน</a></li>
                    <?php
                    }
                    ?>
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> ออกจากระบบ</a></li>
                </ul>
            </li>
        <?php } ?>
        </li>
        </ul>
    </div>
</nav>