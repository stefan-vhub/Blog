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
	<!-- Admin Header -->
	
		<?php include(ROOT_PATH . '/app/includes/adminHeader.php'); ?>
	
	<!-- // Admin Header -->

    <!-- Aadmin Main -->
    <div id="admin-main">

        <!-- Admin Sliderbar -->
            
            <?php include(ROOT_PATH . '/app/includes/adminSlidebar.php'); ?>

        <!-- // Admin Sliderbar -->

        <!-- Admin Content -->

        <div class="admin-content">
            
            <div class="button-group">
                <a href="index.php" class="btn btn-big">Manage User</a>
                <a href="create.php" class="btn btn-big">Add Users</a>
            </div>

            <div class="content">
                <h2 class="page-title">Add User</h2>
				
				<!-- Erorrs -->

					<?php include(ROOT_PATH . "/app/helpers/fromErrors.php"); ?>

				<!-- Erorrs -->
                
                <form action="create.php" method="post">
                    
					<div class="form-inputBox">
                        <label>Name</label>
                        <input type="text" name="name" class="text-input" value="<?php echo $name; ?>">
                    </div>
					
                    <div class="form-inputBox">
                        <label>Email</label>
                        <input type="email" name="email" class="text-input" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-inputBox">
                        <label>Username</label>
                        <input type="text" name="username" class="text-input" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-inputBox">
                        <label>Password</label>
                        <input type="password" name="password" class="text-input" value="<?php echo $password; ?>">
                    </div>
                    <div class="form-inputBox">
                        <label>Password Confirmation</label>
                        <input type="password" name="passwordConf" class="text-input" value="<?php echo $passwordConf; ?>">
                    </div>

                    <?php if($_SESSION['admin'] == 3): ?>

                    <div class="form-inputBox">
                    <label>Rol</label>
                        <select name="admin" class="text-input">
                            <option selected>Select Rol</option>
                            <option value="2">Admin</option>
                            <option value="1">Author</option>
                        </select>
                    </div>

                    <?php else: ?>

                    <div class="form-inputBox">
                    <label>Select Rol</label>
                        <select name="admin" class="text-input" disabled>
                            <option value="2">Admin</option>
                            <option value="1" selected >Author</option>
                        </select>
                    </div>

                    <?php endif; ?>

                    <div class="form-inputBox">
                        <button type="submit" name="signup-btn" class="btn btn-big">Add User</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- // Admin Content -->

    </div>

    <!-- // Admin Main -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Ckeditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>

    <!-- Custom Script -->
    <script src="../../js/scripts.js"></script>

</body>
</html>
