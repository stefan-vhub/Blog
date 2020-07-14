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
            <a href="index.php" class="btn btn-big">Manage Posts</a>
            <a href="create.php" class="btn btn-big">Add Posts</a>
        </div>

        <div class="content">
            <h2 class="page-title">Add Posts</h2>

            <!-- Erorrs -->

            <?php include(ROOT_PATH . "/app/helpers/fromErrors.php"); ?>

            <!-- Erorrs -->

            <form action="edit.php" method="post" enctype="multipart/form-data">
                <div class="form-inputBox">
                    <label>Title</label>
                    <input type="hidden" name="id" value="<?php echo $getPost['id']; ?>">
                    <input type="text" name="title" class="text-input" value="<?php echo $getPost['title']; ?>">
                </div>
                <div class="form-inputBox">
                    <label>Body</label>

                <textarea name="body" id="body"> <?php echo $getPost['body']?> </textarea>
                </div>
                <div class="form-inputBox">
                    <label>Images</label>
                    <input type="file" name="image" class="text-input">
                </div>
                <div class="form-inputBox">
                    <label>Topics</label>
                    <select name="topic_id" class="text-input">

                        <option>Select Topic</option>
                        <?php foreach($tableTopics as $key => $topic): ?>

                            <?php if($getPost['topic_id'] === $topic['id']): ?>
                                <option value="<?php echo $topic['id'];?>" selected><?php echo $topic['name'];?></option>
                            <?php else: ?>
                                <option value="<?php echo $topic['id'];?>"><?php echo $topic['name'];?></option>
                            <?php endif;?>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-inputBox">
                    <label>Publish</label>
                    <select name="publish" class="text-input">

                        <option value="1">Yes</option>
                        <option value="0">Not yet</option>

                    </select>

                </div>
                <div class="form-inputBox">
                    <button type="submit" name="update-post" class="btn">Add Post</button>
                </div>
            </form>

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
