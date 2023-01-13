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

// commento per non far sovrascrivere più il file todo.json
// $jsonTodoList = json_encode($todoList);
// file_put_contents('./todo.json', $jsonTodoList);