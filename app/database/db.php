<?php

    session_start();

    require('connect.php');

# <!--- Verification --->

    function dd($value) {
        echo "<pre>", print_r($value, true), "</pre>";
        die();
    }

# <!--- // Verification --->

# <!--- Execute Querry --->

function executeQUERY($sql, $date) {
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($date);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

# <!--- // Execute Querry --->

# <!--- Create --->

function create($table, $data) {
    global $conn;
    $sql = "INSERT INTO $table SET ";
    $i = 0;
    foreach($data as $key => $value) {
        if($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $stmt = executeQUERY($sql, $data);
    $id = $stmt->insert_id;
    return $id;

}

# <!--- // Create --->

# <!--- Select All --->

function selectAll($table, $conditions = []) {
    global $conn;
    $sql = "SELECT * FROM $table";
    if(empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $records;
    } else {        
        $i = 0;
        foreach($conditions as $key => $value) {  
            if($i === 0) {
                $sql = $sql . " WHERE $key=?";  
            } else {
                $sql = $sql . " AND $key=?";  
            }
            $i++;
        }

        $stmt = executeQUERY($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

# <!--- // Select All --->

# <!--- Select with Limit --->

function selectLimit($table, $start_end, $end = [], $conditions = []) {
    global $conn;
    $sql = "SELECT * FROM $table";
    if(empty($conditions)) {
        if(empty($end)) {
            $sql = $sql . " ORDER BY `created_at` DESC LIMIT $start_end";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;

        } else {
            $sql = $sql . " ORDER BY `created_at` DESC LIMIT $start_end, $end";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
    } else {        
        $i = 0;
        foreach($conditions as $key => $value) {  
            if($i === 0) {
                $sql = $sql . " WHERE $key=?";  
            } else {
                $sql = $sql . " AND $key=?";  
            }
            $i++;
        }
        if(empty($end)) {
            $sql = $sql . " ORDER BY `created_at` DESC LIMIT $start_end";

        } else {
            $sql = $sql . " ORDER BY `created_at` DESC LIMIT $start_end, $end";
        }
        
        $stmt = executeQUERY($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

# <!--- // Select with Limit --->

# <!--- Select One --->

function selectOne($table, $conditions) {
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach($conditions as $key => $value) {
        if($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";

    $stmt = executeQUERY($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

# <!--- // Select One --->

# <!--- Update --->

function update($table, $id, $data) {
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach($data as $key => $value) {  
        if($i === 0) {
            $sql = $sql . " $key=?";  
        } else {
            $sql = $sql . ", $key=?";  
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";

    $data['id'] = $id;
    $stmt = executeQUERY($sql, $data);
    return $stmt->affected_rows; 

}

# <!--- // Update --->

# <!--- Delete --->

function delete($table, $id) {
    $sql = "DELETE FROM $table WHERE id=?";
    
    $stmt = executeQUERY($sql, ['id' => $id]);
    return $stmt->affected_rows; 
}

# <!--- // Delete ---> 

# <!--- getPublishedPosts --->

function getPublishedPosts() {
    $sql = "SELECT * FROM posts WHERE publish=?";
    
    $stmt = executeQUERY($sql, ['publish' => 1 ]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

# <!--- // getPublishedPosts ---> 

# <!--- getPostsByTopicId --->

function getPostsByTopicId($topic_id) {
    global $conn;
    $sql = "SELECT * FROM posts WHERE publish=? AND topic_id=?";

    $stmt = executeQUERY($sql, ['publish' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

# <!--- // getPostsByTopicId --->

# <!--- getPostsByTopicId --->

function searchPosts($term) {
    $match = '%' . $term . '%';  
    global $conn;
    $sql = "SELECT * FROM posts WHERE publish=?
            AND title LIKE ? 
            OR body LIKE ?";

    $stmt = executeQUERY($sql, ['publish' => 1, 'title' => $match, 'body' => $match ]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

# <!--- // getPostsByTopicId --->

# <!--- getPostsByTopicId --->

function totalRows($table, $conditions = []) {
    global $conn;
    $sql = "SELECT * FROM $table";
    if(empty($conditions)) {
        $stmt = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($stmt);

        return $records;
    } else {        
        $i = 0;
        foreach($conditions as $key => $value) {  
            if($i === 0) {
                $sql = $sql . " WHERE $key=?";  
            } else {
                $sql = $sql . " AND $key=?";  
            }
            $i++;
        }

        $stmt = executeQUERY($sql, $conditions);
        $records = $stmt->get_result();
        return mysqli_num_rows($records);
    }
}

# <!--- // getPostsByTopicId --->

# <!--- orderTab --->

function orderTab($table, $column) {
    global $conn;
    $sql = "SELECT * FROM $table ORDER BY $column DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

# <!--- // orderTab --->

