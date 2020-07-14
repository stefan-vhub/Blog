<?php

    include(ROOT_PATH . '/app/database/db.php');
    include(ROOT_PATH . '/app/helpers/validateTopic.php');
	
	$errors = array();
	$table = 'topics';

	$tableTopics = selectAll($table);

	# <!--- Edit Topic Show --->

	if(isset($_GET['id'])) {
		$getTopic = selectOne($table, ['id' => $_GET['id']]);
	}

	# <!--- // Edit Topic Show --->

	# <!--- New Topic --->

	if(isset($_POST['new-post-btn'])) {
		$errors = validatePost($_POST);
		if(count($errors) === 0) {
			unset($_POST['new-post-btn']);
			$_POST['user_id'] = $_SESSION['id'];
			$_POST['description'] = htmlentities($_POST['description']);
			$topic = create($table, $_POST);
			$_SESSION['message'] = "Topic created succesful";
			$_SESSION['type'] = "success";
			
			header('Location: index.php');
			exit();
		}
	}

	# <!--- // New Topic --->

	# <!--- Update Topic --->
	
	if(isset($_POST['edit-topic'])) {
		$errors = validatePost($_POST);
		if(count($errors) === 0) {
			$id = $_POST['id'];
			unset($_POST['edit-topic'], $_POST['id']);
			$topic = update($table, $id, $_POST);
			$_SESSION['message'] = "Topic updated succesful";
			$_SESSION['type'] = "success";

			header('Location: index.php');
			exit();
		}
		// Errors not work 
		header('Location: edit.php?id=' . $_POST['id']);
	}
	
	# <!--- // Update Topic --->

	# <!--- Delete Topic --->
	
	if(isset($_GET['deleted_topic'])) {
		delete($table, $_GET['deleted_topic']);
		$_SESSION['message'] = "Topic deleted succesful";
		$_SESSION['type'] = "success";

		header('Location: index.php');
		exit();
	}
	
	# <!--- // Delete Topic --->
























