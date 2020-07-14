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

        <!-- ADMIN CONTENT -->
        <div class="admin-content">

            <div class="button-group">
                <a href="index.php" class="btn btn-big">Manage User</a>
				<?php if($_SESSION['admin'] > 1 ):?>
                	<a href="create.php" class="btn btn-big">Add Users</a>
				<?php endif; ?>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Users</h2>

                <!-- Messager -->

                    <?php include(ROOT_PATH . "/app/includes/messager.php"); ?>

                <!-- // Messager -->
				
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
						
						<?php foreach($tableUser as $key => $user): ?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $user['username'] ?></td>

                                <?php if($user['admin'] == 3):?>
                                    <td><?php echo "Administrator" ?></td>
                                <?php else:?>
                                    <td><?php echo $user['admin'] == 2 ? 'Admin' : 'Autor'; ?></td>
                                <?php endif;?>

								<?php if($_SESSION['admin'] == 3):?>
									<td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">edit</a></td>
									<td><a href="index.php?delete_id=<?php echo $user['id'] ?>" class="delete">delete</a></td>
                                <?php elseif($_SESSION['id'] == $user['id'] || ($_SESSION['admin'] == 2 && $user['admin'] < 2)): ?>
                                    <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">edit</a></td>
                                    <td><a href="index.php?delete_id=<?php echo $user['id'] ?>" class="delete">delete</a></td>
                                <?php else: ?>
                                    <td><a style="color:gray; text-decoration: none">edit</a></td>
                                    <td><a style="color:gray; text-decoration: none">delete</a></td>
								<?php endif; ?>

							</tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
            </div>       
        </div>
        <!-- // ADMIN CONTENT -->

        <div class="clean"></div>

    </main>
    <!-- // MAIN ADMIN -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Ckeditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>

    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>

</body>
</html>
