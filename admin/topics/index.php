<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . '/app/controllers/topics.php'); ?>
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
	
    <!-- Admin Page Wrapper -->
    <div id="admin-main">

        <!-- Left Sliderbar -->
            
            <?php include(ROOT_PATH . '/app/includes/adminSlidebar.php'); ?>

        <!-- // Left Sliderbar -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="index.php" class="btn btn-big">Manage Topics</a>
                <a href="create.php" class="btn btn-big">Add Topics</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Topics</h2>

                <!-- Messager -->

                    <?php include(ROOT_PATH . "/app/includes/messager.php"); ?>

                <!-- // Messager -->

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Created by</th>

                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
						
						<?php foreach($tableTopics as $key => $topic): ?>
                            <?php $tabUser = selectOne('users', ['id' => $topic['user_id']]); ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $topic['name']; ?></td>
                                <td><?php echo $tabUser['name']; ?></td>
                                
                                <?php if($_SESSION['admin'] == 1): ?>
                                    <?php if($_SESSION['id'] == $tabUser['id']): ?>
                                        <td><a href="edit.php?id=<?php echo $topic['id'];?>" class="edit">edit</a></td>
                                        <td><a href="edit.php?deleted_topic=<?php echo $topic['id'];?>" class="delete">delete</a></td>
                                    <?php else: ?>
                                        <td><a style="color:gray; text-decoration: none">edit</a></td>
                                        <td><a style="color:gray; text-decoration: none">delete</a></td>
                                    <?php endif; ?>
                                <?php else:?>
                                    <td><a href="edit.php?id=<?php echo $topic['id'];?>" class="edit">edit</a></td>
                                    <td><a href="edit.php?deleted_topic=<?php echo $topic['id'];?>" class="delete">delete</a></td>
                                <?php endif; ?>

						
						<?php endforeach; ?>
						
                    </tbody>
                </table>
            </div>
        </div>
        <!-- // Admin Content -->

    </div>

    <!-- // Page Wrapper -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Ckeditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>

    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>

</body>
</html>
