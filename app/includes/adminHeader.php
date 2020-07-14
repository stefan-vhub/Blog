<header id="admin-header">
    <div class="logo">
        <a href="<?php echo BASE_URL . '/index.php'; ?>"><h1 class="logo-text"><span>Stefan's</span> blog</h1></a>
    </div>
    <ul>
        <li>
            <a href="#">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['name']; ?>
                <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
            </a>
            <ul>
                <li><a href="<?php echo BASE_URL . '/index.php'; ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Logout</a></li>
            </ul>
        <li>
    </ul>
    <div class="clean"></div>
</header>