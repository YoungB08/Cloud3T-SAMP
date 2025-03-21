<?php
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Đăng nhập</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= $base_url ?>assets/img/favicon.jpg">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="<?= $base_url ?>assets/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Đăng ký</h3>
                            <h4>Vui lòng đăng ký để tiếp tục</h4>
                        </div>
                        <div class="form-login">
                            <label>Tên đăng nhập</label>
                            <div class="form-addons">
                                <input type="text" id="username" placeholder="Nhập têm đăng nhập của bạn">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Mật khẩu</label>
                            <div class="pass-group">
                                <input type="password" id="password" class="pass-input" placeholder="Nhập mật khẩu của bạn">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="pass-group">
                                <input type="email" id="email" placeholder="Nhập email của bạn">
                            </div>
                        </div>
                        <div class="form-login">
                            <button class="btn btn-login" id="btnReg">Đăng ký</button>

                        </div>
                        <div class="signinform text-center">
                            <h4>Bạn đã có tài khoản? <a href="<?= hUrl('Login') ?>" class="hover-a">Đăng nhập</a></h4>
                        </div>

                    </div>
                </div>
                <div class="login-img">
                    <img src="<?= $base_url ?>assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="<?= $base_url ?>assets/js/jquery-3.6.0.min.js"></script>

    <script src="<?= $base_url ?>assets/js/feather.min.js"></script>

    <script src="<?= $base_url ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= $base_url ?>assets/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnReg").click(function(e) {
                e.preventDefault();

                let username = $("#username").val();
                let password = $("#password").val();
                let email = $("#email").val();
                let loginButton = $("#btnReg");

                // Kiểm tra nếu ô nhập trống
                if (username === "" || password === "" || email === "") {
                    Swal.fire({
                        icon: "warning",
                        title: "Lỗi",
                        text: "Vui lòng nhập đủ thông tin!",
                    });
                    return;
                }

                // Hiển thị loading và disable nút
                loginButton.prop("disabled", true).text("Đang đăng ký...");

                $.ajax({
                    url: "<?= $base_url ?>backend/auth/register",
                    type: "POST",
                    data: {
                        username: username,
                        password: password,
                        email: email,
                        sign: '<?= $sign ?>'
                    },
                    dataType: "json", // Đảm bảo nhận JSON
                    success: function(response) {
                        if (response.status === 1) {
                            Swal.fire({
                                icon: "success",
                                title: "Đăng ký thành công!",
                                text: response.msg
                            })
                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: "Lỗi!",
                                text: response.msg
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Đăng nhập thất bại!",
                            text: xhr.responseJSON?.msg || "Sai tài khoản hoặc mật khẩu!"
                        });
                    }
                });
                loginButton.prop("disabled", false).text("Đăng ký");
            });
        });
    </script>
</body>

</html>