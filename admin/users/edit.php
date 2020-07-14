<?php include('../../path.php'); ?>
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
    <link rel="stylesheet" href="../../assets/css/single.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">

</head>
<body>
    
    <!-- HEADER ADMIN -->

        <?php include(ROOT_PATH . '/app/includes/adminHeader.php'); ?>

    <!-- // HEADER ADMIN -->

    <!-- MAIN ADMIN -->
    <main id="admin-main">

        <!-- SLIDERBAR -->

            <?php include(ROOT_PATH . '/app/includes/adminSlidebar.php') ?>

        <!-- // SLIDERBAR -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="index.php" class="btn btn-big">Manage User</a>
                <a href="create.php" class="btn btn-big">Add Users</a>
            </div>

            <div class="content">
                <h2 class="page-title">Edit User</h2>

                <!-- Errors -->
                
                <?php include(ROOT_PATH . "/app/helpers/fromErrors.php") ?>
                
                <!-- // Errors -->

                <!-- Messager -->

                <?php include(ROOT_PATH . "/app/includes/messager.php"); ?>

                <!-- // Messager -->

                <form action="edit.php?id=<?php echo $getUser['id']; ?>" method="post">

                    <input type="hidden" name="id" value="<?php echo $getUser['id']; ?>">
                    <div class="form-inputBox">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $getUser['name']; ?>" class="text-input">
                    </div>
                    <div class="form-inputBox">
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $getUser['username']; ?>" class="text-input">
                    </div>
                    <div class="form-inputBox">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $getUser['email']; ?>" class="text-input">
                    </div>
                    <div class="form-inputBox">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
                    </div>

                    <!-- Rol User -->
                    <?php if($_SESSION['admin'] == 3): ?>
                        <?php if($getUser['admin'] == 3): ?>
                        <div class="form-inputBox">
                            <label>Select Rol</label>
                            <select name="admin" class="text-input">
                                <option value="3">Administrator</option>
                            </select>
                        </div>
                        <?php elseif($getUser['admin'] == 2): ?>
                        <div class="form-inputBox">
                            <label>Select Rol</label>
                            <select name="admin" class="text-input">
                                <option value="2" selected>Admin</option>
                                <option value="1">Author</option>
                            </select>
                        </div>
                        <?php else: ?>
                        <div class="form-inputBox">
                            <label>Select Rol</label>
                            <select name="admin" class="text-input">
                                <option value="2">Admin</option>
                                <option value="1" selected>Author</option>
                            </select>
                        </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="form-inputBox">
                            <label>Select Rol</label>
                            <select name="admin" class="text-input" disabled>
                                <option value=""><?php echo $getUser == 2 ? 'Admin':'Author'; ?></option>
                            </select>
                        </div>
                    <?php endif; ?>
                    <!-- // Rol User -->


                    <div class="form-inputBox">
                        <button type="submit" name="edit-user" class="btn">Edit User</button>
                    </div>
                </form>

                <form action="edit.php?id=<?php echo $getUser['id']; ?>" method="post">
                    <fieldset>
                        <legend>Change Password</legend>
                        <div class="form-inputBox">
                            <label>Old Password</label>
                            <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
                         </div>
                        <div class="form-inputBox">
                            <label>Password</label>
                            <input type="password" name="passwordNew" value="<?php echo $password; ?>" class="text-input">
                         </div>
                        <div class="form-inputBox">
                            <label>Password Confirmation</label>
                            <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
                        </div>

                        <div class="form-inputBox change-pass">
                            <input type="submit" name="change-pass" class="btn"value="Change Passwors">
                        </div>


                    </fieldset>
                </form>

            </div>
        <!-- // Admin Content -->

        <div class="clean"></div>

    </main>
    <!-- // Admin Main -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Ckeditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>

    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>

</body>
</html>
