<?php
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
if (!isset($_GET['api_key']) || !isset($_GET['id_video'])) {
    die(json_encode(["status" => 2, "message" => "Thiếu api_key hoặc id_video!"]));
}

$api_key = $_GET['api_key'];
$id_video = $_GET['id_video'];

// Kiểm tra API key hợp lệ

if (!check_rows('users', "API_Key", $api_key)) {
    die(json_encode(["status" => 3, "message" => "API key không hợp lệ!"]));
}

$api_url = "http://localhost:89/download?id=" . urlencode($id_video);

// Gửi yêu cầu đến API Flask
$response = file_get_contents($api_url);
if ($response === FALSE) {
    die(json_encode(["status" => 99, "message" => "Lỗi kết nối đến server MP3!"]));
}

// Chuyển đổi JSON response thành mảng PHP
$data = json_decode($response, true);

if ($data === NULL) {
    die(json_encode(["status" => 98, "message" => "Lỗi: Không có dữ liệu!"]));
}

// Xử lý kết quả từ Flask
$status = $data['status'] ?? 99;
$message = $data['message'] ?? "Lỗi không xác định!";
$file_path = $data['file_path'] ?? "";

// Phản hồi dựa trên status
if ($status == 1) {
    $mp3 = $KNCMS->query("INSERT INTO `mp3` (MP3_ID, CreatedTime) VALUES ('$id_video', '$time')");
    if ($mp3) {
        echo json_encode([
            "status" => 1,
            "message" => "Tải xuống thành công!",
            "video_id" => $id_video
            // "file_url" => "$base_url/Data/" . basename($file_path) // Điều chỉnh theo rewrite rule
            // chống mò data
        ]);
    } else {
        echo json_encode([
            "status" => 95,
            "message" => "Lỗi máy chủ MP3!"
        ]);
    }
} elseif ($status == 2) {
    echo json_encode(["status" => 2, "message" => "Sai ID video!"]);
} elseif ($status == 99) {
    echo json_encode(["status" => 99, "message" => "Lỗi hệ thống: $message"]);
} else {
    echo json_encode(["status" => $status, "message" => "Lỗi không xác định: $message"]);
}
