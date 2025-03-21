<?php
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

if (!isset($_GET['api_key']) || !isset($_GET['id_video'])) {
    http_response_code(400);
    die(json_encode(["status" => 2, "message" => "Thiếu api_key hoặc id_video!"]));
}

$api_key = $_GET['api_key'];
$id_video = $_GET['id_video']; // Xử lý đầu vào tránh lỗi bảo mật

// Kiểm tra API key có hợp lệ không
if (!check_rows('users', "API_Key", $api_key)) {
    http_response_code(403);
    die(json_encode(["status" => 3, "message" => "API key không hợp lệ!"]));
}

// Kiểm tra MP3 ID có tồn tại trong database không
if (!check_rows('mp3', "MP3_ID", $id_video)) {
    $response = $KNCMS->curl_get($base_url.'backend/youtube/getmp3?api_key='.$api_key.'&id_video='.$id_video);
    $response = json_decode($response, true);
    $status = $response['status'] ?? 99;
    $message = $response['message'] ?? "Lỗi không xác định!";

    if ($status != 1) {
        http_response_code(400);
        die(json_encode(["status" => $status, "message" => $message]));
    }
}

$file_path = $_SERVER['DOCUMENT_ROOT'] . "/app/youtube/downloads/{$id_video}.mp3";

header("Content-Type: audio/mpeg");
header("Content-Length: " . filesize($file_path));
header("Content-Disposition: inline");
header("Accept-Ranges: bytes");

readfile($file_path);
flush();
?>
