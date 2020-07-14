<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php'); ?>
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

    <!-- Admin header -->

        <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- // Admin header -->

    <!-- Admin Page Wrapper -->
    <div id="admin-main">

        <!-- Left Sliderbar -->
            
            <?php include(ROOT_PATH . '/app/includes/adminSlidebar.php'); ?>

        <!-- // Left Sliderbar -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="index.php" class="btn btn-big">Manage Post</a>
                <a href="create.php" class="btn btn-big">Add Posts</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Posts</h2>

                <!-- Messager -->

                <?php include(ROOT_PATH . "/app/includes/messager.php"); ?>

                <!-- // Messager -->

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Topic</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
						<?php foreach($tablePosts as $key => $post): ?>
                            <?php $tabUser = selectOne('users', ['id' => $post['user_id']]); ?>
                            <?php $tabTopic = selectOne('topics', ['id' => $post['topic_id']]); ?>
							<tr>
								<td> <?php echo $key + 1; ?> </td>
								<td> <?php echo $tabTopic['name']?> </td>
								<td> <?php echo $post['title']?> </td>
								<td> <?php echo $tabUser['name']; ?> </td>
								<td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
								<td><a href="edit.php?deleted-post=<?php echo $post['id'];?>" class="delete">delete</a></td>

                                <?php if ($post['publish']): ?>
                                    <td><a href="index.php?publish=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>
                                <?php else: ?>
                                    <td><a href="index.php?publish=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>
                                <?php endif; ?>

							</tr>
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
