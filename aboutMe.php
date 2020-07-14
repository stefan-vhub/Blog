<?php include ('path.php'); ?>

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

<main id="aboutMe-main">
    <form action="">
        <div>
            <h2>Contact</h2>
        </div>

        <div class="">
            <label for="email">Email</label>
            <input type="text" name="email">
        </div>

        <div>
            <label for="name">Nume</label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="subject">Subiect</label>
            <input type="text" name="subject">
        </div>

        <div>
            <label for="message">Mesaj</label>
            <textarea name="message" id="" cols="30" rows="10" ></textarea>
        </div>

        <div>
            <input type="submit" name="submit-email" value="Trimite">
        </div>

    </form>
</main>

<!-- FOOTER -->

<?php include ('app/includes/footer.php');?>

<!-- // FOOTER -->

</body>
</html>
