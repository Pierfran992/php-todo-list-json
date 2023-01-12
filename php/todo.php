<?php

$todoList = [
    [
        "text" => "HTML",
        "completed" => true
    ],
    [
        "text" => "CSS",
        "completed" => false
    ],
    [
        "text" => "Responsive design",
        "completed" => true
    ],
    [
        "text" => "Javascript",
        "completed" => false
    ],
];

$jsonTodoList = json_encode($todoList);
file_put_contents('./todo.json', $jsonTodoList);