<?php include('path.php'); ?>
<?php include(ROOT_PATH . '/app/controllers/users.php'); ?>

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

        <form action="signup.php" method="post" class="container-main">

            <div>
                <h2>Login</h2>
            </div>

            <!-- Erorrs -->

                <?php include(ROOT_PATH . "/app/helpers/fromErrors.php"); ?>

            <!-- Erorrs -->

            <div class="div">
                <label>Nume</label>
                <input type="text" name="name">
            </div>
            
            <div class="div">
                <label>Email</label>
                <input type="email" name="email">
            </div>
            
            <div class="div">
                <label>Nume de Utilizator</label>
                <input type="text" name="username">
            </div>

            <div class="div">
                <label>Parola</label>
                <input type="password" name="password">
            </div>

            <div class="div">
                <label>Confirmarea Parolei</label>
                <input type="password" name="passwordConf">
            </div>

            <div class="div">
                <input type="submit" name="signup-btn" value="Trimite">
            </div>

        </form>


    </main>


    <!-- FOOTER -->

        <?php include ('app/includes/footer.php');?>

    <!-- // FOOTER -->

</body>
</html>
