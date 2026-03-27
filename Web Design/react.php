<?php
header("Content-Type: application/json");

$filename = "react.json";

if (!file_exists($filename)) {
    file_put_contents($filename, json_encode([]));
}

$data = json_decode(file_get_contents($filename), true);

// GET request — load current data
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["id"] ?? "";
    echo json_encode($data[$id] ?? ["likes" => 0, "dislikes" => 0]);
    exit;
}

// POST request — update data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = json_decode(file_get_contents("php://input"), true);
    $id = $input["id"];
    $likes = $input["likes"];
    $dislikes = $input["dislikes"];

    $data[$id] = ["likes" => $likes, "dislikes" => $dislikes];
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));

    echo json_encode(["status" => "success"]);
    exit;
}
?>
