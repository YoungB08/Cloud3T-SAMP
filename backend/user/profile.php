<?php
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

header("Content-Type: application/json; charset=UTF-8");

$response = ["status" => 99, "msg" => "Lỗi hệ thống!"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernames = $KNCMS->anti_text($_POST["username"]) ?? "";
    $type = $KNCMS->anti_text($_POST["type"]) ?? "";

    // Kiểm tra mã bảo mật
    if ($_POST['sign'] != $sign) {
        $response = [
            "status" => 99,
            "msg"    => "Sai mã bảo mật (Sign), thử lại sau 1-2p!"
        ];
        echo json_encode($response);
        exit;
    }
    if ($usernames == "") {
        $response = [
            "status" => 99,
            "msg" => "Lỗi chưa đăng nhập"
        ];
        echo json_encode($response);
        exit;
    }
    if ($type == 'genapi') {
        $api_key_u = md5($usernames . $sign . $time . 'Cloud3TSalt');

        $up = $KNCMS->query("UPDATE `users` SET `API_Key` = '$api_key_u' WHERE `Username` = '$usernames'");
        if ($up) {
            $response = [
                "status" => 1,
                "msg" => "Lấy API Key mới thành công!"
            ];
            echo json_encode($response);
            exit;
        }
    }
}
