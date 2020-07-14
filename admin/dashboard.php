<?php include('../path.php'); ?>
<?php include(ROOT_PATH . '/app/controllers/users.php'); ?>
<?php include(ROOT_PATH . '/app/helpers/middleware.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Blog">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="author" content="Petrescu Viorel Stefan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVStefan | Blog</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/single.css">
    <link rel="stylesheet" href="../assets/css/admin.css">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">

</head>
<body>
    
    <!-- HEADER ADMIN -->
    
        <?php include(ROOT_PATH . '/app/includes/adminHeader.php'); ?>

    <!-- // HEADER ADMIN -->

    <!-- MAIN ADMIN -->
    <main id="admin-main">

        <!-- ADMIN SLIDERBAR -->

                <?php include(ROOT_PATH . '/app/includes/adminSlidebar.php') ?>

        <!-- // ADMIN SLIDERBAR -->

        <!-- ADMIN CONTENT -->
        <div class="admin-content">

            <!-- Message -->

                <?php include(ROOT_PATH . "/app/includes/messager.php"); ?>
                
            <!-- // Message -->

        </div>
        <!-- // ADMIN CONTENT -->

        <div class="clean"></div>

    </main>
    <!-- // MAIN ADMIN -->

</body>
</html>
