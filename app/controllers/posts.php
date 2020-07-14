<?php

    include(ROOT_PATH . '/app/database/db.php');
    include(ROOT_PATH . '/app/helpers/validatePost.php');

	$errors = array();
	$table = 'posts';

	$tablePosts = selectAll($table);
    $tableTopics = selectAll('topics');
    $orderPost = orderTab($table,'created_at');

	# <!--- Edit Topic Show --->

	if(isset($_GET['id'])) {
		$getPost = selectOne($table, ['id' => $_GET['id']]);
    }
    
	# <!--- // Edit Topic Show --->

    # <!--- Edit Topic Show --->



	# <!--- New Post --->

	if(isset($_POST['add-post'])) {	
    $errors = validatePost($_POST);
    if(!empty($_FILES["image"]['name'])) {
        $image_name = time() . "_" . $_FILES["image"]['name'];
        $destiantion = ROOT_PATH . "/assets/images/" . $image_name;
        
        $result = move_uploaded_file($_FILES["image"]['tmp_name'], $destiantion);

        if($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
        
    } else {
        array_push($errors, "Post image required");
    }

    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['publish'] = isset($_POST['publish']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);
        $_SESSION['message'] = "Post created successfully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php");
        exit();
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }

}

	# <!--- // New Post --->

    # <!--- Edit Post --->

    if(isset($_POST['update-post'])) {
        $errors = validatePost($_POST);
        if(!empty($_FILES["image"]['name'])) {
            $image_name = time() . "_" . $_FILES["image"]['name'];
            $destiantion = ROOT_PATH . "/assets/images/" . $image_name;

            $result = move_uploaded_file($_FILES["image"]['tmp_name'], $destiantion);

            if($result) {
                $_POST['image'] = $image_name;
            }
        }
        if (count($errors) == 0) {
            $id = $_POST['id'];
            unset($_POST['update-post'], $_POST['id']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['body'] = htmlentities($_POST['body']);
            $post_id = update($table, $id, $_POST);
            $_SESSION['message'] = "Post updated successfully";
            $_SESSION['type'] = "success";
            header("location: " . BASE_URL . "/admin/posts/index.php");
            exit();
        }

    }

    # <!--- // Edit Post --->

    # <!--- Delete Post --->

    if(isset($_GET['deleted-post'])) {
        delete($table, $_GET['deleted-post']);
        $_SESSION['message'] = "Topic deleted succesful";
        $_SESSION['type'] = "success";

        header('Location: index.php');
        exit();
    }

    # <!--- // Delete Post --->

    if(isset($_GET['publish']) && isset($_GET['p_id'])) {
        $published = $_GET['publish'];
        $p_id = $_GET['p_id'];
    
        $count = update($table, $p_id, ['publish' => $published]);
    
        $_SESSION['message'] = "Post published state changed!";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php");
        exit();
    }

    