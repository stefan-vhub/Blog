<?php include('path.php'); ?>
<?php include(ROOT_PATH . '/app/controllers/users.php'); ?>
<?php 

    if(isset($_SESSION['username'])) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    }

?>

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
    <link rel="stylesheet" href="assets/css/single.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>

    <!-- HEADER -->

        <?php include ('app/includes/header.php');?>

    <!-- // HEADER -->

    <main id="contact-main">

        <form action="login.php" method="post" class="container-main">

            <div class="titleh2">
                <h2>Login</h2>
            </div>

            <!-- Erorrs -->

                <?php include(ROOT_PATH . "/app/helpers/fromErrors.php"); ?>

            <!-- Erorrs -->

            <div class="div">
                <label for="username">Nume de Utilizator</label>
                <input type="text" name="username">
            </div>

            <div class="div">
                <label for="password">Parola</label>
                <input type="password" name="password">
            </div>


            <div class="div">
                <input type="submit" name="btn-login" value="Trimite">
            </div>

        </form>


    </main>


    <!-- FOOTER -->

        <?php include ('app/includes/footer.php');?>

    <!-- // FOOTER -->

</body>
</html>
