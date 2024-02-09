<?php

// Проверяем, был ли запрос выполнен методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstValue = $_POST["first"];
    $secondValue = $_POST["second"];


    $response = array(
        "first" => $firstValue,
        "second" => $secondValue,
        "message" => "Данные успешно получены на сервере."
    );

    // Устанавливаем заголовки для ответа в формате JSON
    header('Content-Type: application/json');
    // Выводим данные в формате JSON
    echo json_encode($response);
} else {
    // Если запрос не был выполнен методом POST, возвращаем ошибку
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Метод не разрешен";
}

