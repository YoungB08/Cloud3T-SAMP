<?php
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

header("Content-Type: application/json; charset=UTF-8");

$response = ["status" => 99, "msg" => "Lỗi hệ thống!"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $KNCMS->anti_text($_POST["username"]) ?? "";
    $password = $KNCMS->anti_text($_POST["password"]) ?? "";

    // Kiểm tra mã bảo mật
    if ($_POST['sign'] != $sign 
    
    
    
    
    ) {
        $response = [
            "status" => 99,
            "msg"    => "Sai mã bảo mật (Sign), thử lại sau 1-2p!"
        ];
        echo json_encode($response);
        exit;
    }

    // Kiểm tra tài khoản & mật khẩu
    if (check_rows('users', 'Username', $username) && check_rows('users', 'Password', $password)) {
        $user = $KNCMS->getUser($username);
        
        // Kiểm tra xác thực tài khoản
        if ($user['Auth'] != 0) {
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $username;

            // Cập nhật thời gian đăng nhập cuối
            $KNCMS->query("UPDATE `users` SET `LastLogin` = '$time' WHERE `Username` = '$username'");

            $response = [
                "status" => 1,
                "msg"    => "Đăng nhập thành công!"
            ];
        } else {
            $response = [
                "status" => 2,
                "msg"    => "Tài khoản chưa được xác thực!"
            ];
        }
    } else {
        http_response_code(401); // Unauthorized
        $response = [
            "status" => 2,
            "msg"    => "Sai tài khoản hoặc mật khẩu!"
        ];
    }
}

echo json_encode($response);
exit;
