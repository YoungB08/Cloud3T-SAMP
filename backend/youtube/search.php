<?php
$apiKey_ytb = "AIzaSyA547Ddc2k9P0h-BWtRJ409jGFRkBC0Vpw";
$user_apikey = $_GET['key'];
$query = $_GET['search'] ?? null;
$type = $_GET['type'] ?? "default";
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$limit = isset($_GET['limit']) ? (int)$_GET['limit']: null;
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

$cacheDir = "cache/";
$cacheFile = $cacheDir . md5($query. $limit) . ".json";
$cacheTime = 300; // 5 phút

if ($limit !== null && $limit > 50) {
    die(json_encode(["status" => 31, "msg" => "Limit must be small than 50"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}// Kiểm tra API key
if (!$user_apikey) {
    die(json_encode(["status" => 99, "msg" => "No API Key Input"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
if (!check_rows('users', "API_Key", $user_apikey)) {
    die(json_encode(["status" => 98, "msg" => "API KEY does not exist"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
if (!$query && $type !== "info") {
    die(json_encode(["status" => 95, "msg" => "Search query not found"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Trả về thông tin API nếu type=info
if ($type === "info") {
    die(json_encode(["status" => 1, "apikey" => $user_apikey, "query" => $query, "msg" => "Success"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Kiểm tra cache
if (file_exists($cacheFile)) {
    $cachedData = file_get_contents($cacheFile);
    $data = json_decode($cachedData, true);
} else {
    $apiUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=" . urlencode($query) . "&maxResults=".$limit."&type=video&key=$apiKey_ytb";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    // Chỉ lưu cache nếu có dữ liệu hợp lệ
    if (!empty($data['items'])) {
        $cacheData = [];
        foreach ($data['items'] as $video) {
            $cacheData[] = [
                "Title" => $KNCMS->xoadauvn($video['snippet']['title']),
                "Channel" => $video['snippet']['channelTitle'],
                "Link" => "https://www.youtube.com/watch?v=" . $video['id']['videoId']
            ];
        }
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
        file_put_contents($cacheFile, json_encode($cacheData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        die(json_encode(["status" => 90, "msg" => "No data found"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

// Nếu type="data", lấy video theo ID
if ($type === "data") {
    if ($id === null || $id < 1 || $id > count($data)) {
        die(json_encode(["status" => 91, "msg" => "Invalid ID, out of range"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    die(json_encode(["status" => 1, "data" => $data[$id - 1]], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Nếu type="default", trả về toàn bộ danh sách
// die(json_encode(["status" => 1, "query" => $query, "msg" => "Success", "data" => $data], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
?>
