<?php

    include(ROOT_PATH . '/app/database/db.php');
    include(ROOT_PATH . '/app/helpers/validateUser.php');

    $errors = array();
    $data = array();
    $table = 'users';
	$name = "";
	$username = "";
	$email = "";
	$password = "";
	$passwordConf = "";

    $tableUser = selectAll($table);

# <!--- User Edit --->

    if(isset($_GET['id'])) {
        $getUser = selectOne($table, ['id' => $_GET['id']]);
    }

# <!--- // User Edit --->
    
# <!--- Login User --->

    function loginUser($user) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['type'] = "success";

        header('location: ' . BASE_URL . '/admin/dashboard.php');
		exit();
    }

# <!--- // Login User --->

# <!--- Register new user --->

if (isset($_POST['signup-btn'])) {
    $errors = validateUser($_POST);
    if(count($errors) === 0) {
        unset($_POST['signup-btn'], $_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $id = create($table, $_POST);
        $user = selectOne($table, ['id' => $id]);
        if(!isset($_SESSION['admin'])) {
            loginUser($user);
        } else {
            $_SESSION['message'] = "User created succesful";
            $_SESSION['type'] = "success";

            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        }
    } else {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

# <!--- // Register new user --->

# <!--- Login user --->

if (isset($_POST['btn-login'])) {
    $errors = validateLogin($_POST);
    if(count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);
        loginUser($user);
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
}

# <!--- // Login user --->


# <!--- Edit user --->

if(isset($_POST['edit-user'])) {
    $_POST['admin'] = $getUser['admin'];
    $errors = validateUpdateUser($_POST);
    if(count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['password'], $_POST['edit-user'], $_POST['id']);
        $data = array_filter($_POST);
        $count = update($table, $id, $data);
        $_SESSION['message'] = "Admin user update";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/edit.php?id=' . $getUser['id']);
        exit();
    } 
}

# <!--- // Edit user --->

if(isset($_POST['edit-user'])) {
    $errors = validateUpdateUser($_POST);
    if(count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['password'], $_POST['edit-user'], $_POST['id']);
        if(!empty($_POST['passwordConf'])) {
            $_POST['password'] = password_hash($_POST['passwordConf'], PASSWORD_DEFAULT) ;
        }
        $data = array_filter($_POST);
        $count = update($table, $id, $data);
        $_SESSION['message'] = "Admin user update";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/edit.php?id=' . $getUser['id']);
        exit();
    } 
}

# <!--- // Edit user --->

# <!--- Change Password --->

if(isset($_POST['change-pass'])) {
    $_POST['id'] = $getUser['id'];
    $errors = validateChangePass($_POST);
    if(count($errors) === 0) {
        $id = $_POST['id'];
        $_POST['password'] = password_hash($_POST['passwordNew'], PASSWORD_DEFAULT) ;
        unset($_POST['passwordConf'], $_POST['change-pass'], $_POST['id'], $_POST['passwordNew']);
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = "Admin user update";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/edit.php?id=' . $getUser['id']);
        exit();
    } 
}

# <!--- // Change Password --->

# <!--- Delete user --->

if(isset($_GET['delete_id'])) {
    $count = delete($table, $_GET['delete_id']);
    if($_SESSION['id'] == $_GET['delete_id']) {
        header('location: ' . BASE_URL . '/logout.php');
        exit();
    }
    
    $_SESSION['message'] = "Admin user deleted";
    $_SESSION['type'] = "success";
    
    
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}

# <!--- // Delete user --->