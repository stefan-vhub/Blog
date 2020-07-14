<?php

function validatePost($topic) {
	$errors = array();
	
	if(empty($topic['name'])) {
		array_push($errors, 'The name is required');
	}
	
	if(empty($topic['description'])) {
		array_push($errors, 'The description is required');
	}
	
	if(count($errors) === 0) {
		$valTopic = selectOne('topics', ['name' => $topic['name']]);
		if (isset($topic['id']) && $topic['id'] == $valTopic['id']) {
			return $errors;
		}
		if($valTopic) {
			array_push($errors, 'The name exist');
		}
	}
	
	return $errors;
}