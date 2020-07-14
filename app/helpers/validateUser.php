<?php

# <!--- User Validate --->

    function validateUser($user) {
        $errors = array();
        if(empty($user['name'])) {
            array_push($errors, 'Numele este necesar');
        }
        if(empty($user['username'])) {
            array_push($errors, 'Numele de utilizator este necesar');
        }
        if(empty($user['email'])) {
            array_push($errors, 'Emailul este necesar');
        }
        if(empty($user['password'])) {
            array_push($errors, 'Parola este necesara');
        }
		if(empty($user['passwordConf'])) {
            array_push($errors, 'Confirmarea parolei este necesara');
        }
		
		if(!empty($user['password']) && !empty($user['passwordConf'])) {
			if($user['password']!==$user['passwordConf']) {
            	array_push($errors, 'Parolele nu sunt la fel');
        	}
		}
				  
        if(!empty($user['username'])) {
            $valUser = selectOne('users', ['username' => $user['username']]);
            if($valUser) {
                array_push($errors, "Numele de utilizator: <b>'" . $user['username'] . "'</b> exista");
            }
        }

        if(!empty($user['email'])) {
            $valUser = selectOne('users', ['email' => $user['email']]);
            if($valUser) {
                array_push($errors, 'Emailul: "<b>' . $user['email'] . '</b>" exista');
            }
        }
        return $errors;
    }

# <!--- // User Validate --->

# <!---  Login Validate --->

	function validateLogin($user) {
		$errors = array();
	
        if(empty($user['username'])) {
            array_push($errors, 'Numele de utilizator este necesar');
        }
        if(empty($user['password'])) {
            array_push($errors, 'Parola este necesara');
        }
		if(!empty($user['username']) && !empty($user['password'])) {
            $valLogin = selectOne('users', ['username' => $user['username']]);
			if($valLogin == NULL) {
				array_push($errors, 'Numele de utilizator sau parola sunt gresite');
			} else if($user['username'] == $valLogin['username']) {
				if(password_verify($user['password'], $valLogin['password'])) {
					return $errors;
				} else {
					array_push($errors, 'Numele de utilizator sau parola sunt gresite');
                }
			} 
		}
		return $errors;
	}

# <!--- // Login Validate --->


# <!--- Update Validate --->

	function validateUpdateUser($user) {
		$errors = array();
		
        if(empty($user['password'])) {
            array_push($errors, 'Parola este necesara');
        }
		
        if(!empty($user['username'])) {
            $valUpd = selectOne('users', ['username' => $user['username']]);
            if($valUpd) {
                if($valUpd['id'] == $user['id']) {	
				} else {
					array_push($errors, 'Numele de utilizator: "<b>' . $user['username'] . '</b>" exista');
				}
            }
        }
		
		if(!empty($user['email'])) {
            $valUpd = selectOne('users', ['email' => $user['email']]);
            if($valUpd) {
				if($valUpd['id'] == $user['id']) {				
				} else {
					array_push($errors, 'Emailul: "<b>' . $user['email'] . '</b>" exista');
				}
                
            }
        }
		
		if(count($errors) === 0) {
			$valUpd = selectOne('users', ['id' => $user['id']]);
			$valUpd2 = selectOne('users', ['id' => $_SESSION['id']]);

            if((password_verify ($user['password'], $valUpd['password'])) || password_verify ($user['password'], $valUpd2['password'])) {
                return $errors;
            } else {
                array_push($errors, 'Parola este gresita');
            }
        }
        
        if(count($errors) === 0) {
			$valUpd = selectOne('users', ['id' => $user['id']]);

            if(password_verify ($user['password'], $valUpd['password'])) {
                return $errors;
            } else {
                array_push($errors, 'Parola este gresita');
            }
        }
        
		return $errors;
	}

# <!--- // Update Validate --->

# <!--- Change Password --->

    function validateChangePass($user) {
        $errors = array();
            
        if(empty($user['password'])) {
            array_push($errors, 'Parola vechie este necesara');
        }

        if(empty($user['passwordNew'])) {
            array_push($errors, 'Parola noua este necesara');
        }

        if(empty($user['passwordConf'])) {
            array_push($errors, 'Confirmarea parolei este necesara');
        }

        if(!empty($user['passwordNew']) && !empty($user['passwordConf'])) {
            if($user['passwordNew']!==$user['passwordConf']) {
                array_push($errors, 'Parolele nu sunt la fel');
            }
        }

        if(count($errors) === 0) {
            $valUpd = selectOne('users', ['id' => $user['id']]);
            $valUpd2 = selectOne('users', ['id' => $_SESSION['id']]);

            if((password_verify ($user['password'], $valUpd['password'])) || 
                password_verify ($user['password'], $valUpd2['password'])) {
                return $errors;
            } else {
                array_push($errors, 'Parola este gresita');
            }
        }
        
        return $errors;

    }

# <!--- // Change Password --->

















