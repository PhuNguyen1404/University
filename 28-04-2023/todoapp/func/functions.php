<?php
echo "hello world";

if(!file_exists("todos.json")) {
    $todos = [];
    $json = json_encode($todos);
    file_put_contents("todos.json", $json);
} else {
    $todos = getTodos();
}

if(isset($_POST['delete'])) {
    var_dump($_POST);
    deleteTodo($_POST['delete'], $todos);
}

function deleteTodo($index, &$todos) {
    array_splice($todos, $index, 1);
    for ($i=0; $i < count($todos); $i++) { 
        $todos[$i]['id'] = $i;
    }
    storeTodos($todos);
}

if(isset($_POST["todo"])) {
    $new_todo = ["id" => 0, "todo" => $_POST['todo'], "status" => false];
    array_push($todos, $new_todo);
    for ($i=0; $i < count($todos); $i++) { 
        $todos[$i]['id'] = $i;
    }
    storeTodos($todos);
}

function storeTodos($todos) {
    // convert to json
    $json = json_encode($todos, JSON_PRETTY_PRINT);
    // store in file
    file_put_contents("todos.json", $json);
}

function getTodos() {
 // access the todos.json
 $data = file_get_contents("todos.json");
 // convert json to assoc array
 $todos = json_decode($data, true);
 // return array
 return $todos;
};


?>