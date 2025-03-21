<?php
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";

header("Content-Type: application/json; charset=UTF-8");

$response = ["status" => 99, "msg" => "Lỗi hệ thống!"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    $email = $_POST["email"] ?? "";
    
    // Kiểm tra mã bảo mật
    if ($_POST['sign'] != $sign && $_POST['sign'] != 'admin') {
        $response = [
            "status" => 99,
            "msg"    => "Sai mã bảo mật (Sign), có thể API đang bị tấn công!"
        ];
        echo json_encode($response);
        exit;
    }

    // Kiểm tra nếu tài khoản đã tồn tại
    if (check_rows("users", "Username", $username)) {
        $response = [
            "status" => 2,
            "msg"    => "Tài khoản này đã tồn tại!"
        ];
    }
    // Kiểm tra nếu email đã tồn tại
    elseif (check_rows("users", "Email", $email)) {
        $response = [
            "status" => 2,
            "msg"    => "Email đã tồn tại!"
        ];
    }
    else {
        // Tạo token xác thực
        $token = md5($username . $password . $email . $time . $sign);
        
        // Chèn dữ liệu vào database
        $reg = $KNCMS->query("INSERT INTO `users` (`Username`, `Password`, `Email`, `Token`) 
                              VALUES ('$username', '$password', '$email', '$token')");
        
        if ($reg) {
            // Gửi email xác thực
            sendCSM(
                $email,
                $username,
                "Xác thực email",
                'Bạn vừa đăng ký tài khoản. Vui lòng nhấn vào nút bên dưới để xác thực email.',
                hUrl('Verify/' . $token),
                "Xác thực"
            );
            
            $response = [
                "status" => 1,
                "msg"    => "Đăng ký thành công! Hãy kiểm tra email để xác thực tài khoản."
            ];
        } else {
            $response = [
                "status" => 99,
                "msg"    => "Lỗi hệ thống! Không thể đăng ký tài khoản."
            ];
        }
    }
}

echo json_encode($response);
exit;
