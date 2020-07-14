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
    <!-- Admin Header .... -->

    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- // Admin Header .... -->

    <!-- Admin Page Wrapper -->
    <div id="admin-main">

        <!-- Left Sliderbar -->

        	<?php include(ROOT_PATH . "/app/includes/adminSlidebar.php"); ?>

        <!-- // Left Sliderbar -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="index.php" class="btn btn-big">Manage Topics</a>
                <a href="create.php" class="btn btn-big">Add Topics</a>
            </div>

            <div class="content">
                <h2 class="page-title">Edit Topics</h2>
				
				<!-- Errors -->
				 
					<?php include(ROOT_PATH . "/app/helpers/fromErrors.php"); ?>
				
				<!-- // Errors -->
                
				<form action="edit.php?id=<?php echo $getTopic['id']; ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $getTopic['id']; ?>">
                    <div class="form-inputBox">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $getTopic['name']; ?>" class="text-input">
                    </div>
                    <div class="form-inputBox">
                        <label>Description</label>
                        <textarea name="description" id="body"><?php echo $getTopic['description']; ?></textarea>
                    </div>
                    <div class="form-inputBox">
                        <button type="submit" name="edit-topic" class="btn">Edit Topic</button>
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

