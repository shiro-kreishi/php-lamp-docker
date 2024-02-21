<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstValue = $_POST["first"];
    $secondValue = $_POST["second"];

    $response = array(
        "first" => $firstValue,
        "second" => $secondValue,
//        "message" => "Данные успешно получены на сервере.",
        'method' => $_SERVER['REQUEST_METHOD'],
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Метод не разрешен";
}