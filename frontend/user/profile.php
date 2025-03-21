<?php
$title = 'Trang cá nhân';
$title_page = 'Trang cá nhân';
$des_page = 'Chỉnh sửa trang cá nhân';
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/nav.php";
?>

<div class="card">
    <div class="card-body">
        <div class="profile-set">
            <div class="profile-head">
            </div>
            <div class="profile-top">
                <div class="profile-content">
                    <div class="profile-contentimg">
                        <img src="<?= $KNCMS->getUser($username)['Avt'] ?>" alt="img" id="blah">
                        <div class="profileupload">
                            <input type="file" id="imgInp">
                            <a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="profile-contentname">
                        <h2><?= $userinfo['Username'] ?></h2>
                        <h4>Cập nhật ảnh và thông tin cá nhân của bạn.</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control me-2" type="text" value="<?= $userinfo['Email'] ?>" disabled>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label>User Name</label>
                    <input class="form-control me-2" type="text" value="<?= $userinfo['Username'] ?>" disabled>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <label class="me-2 mb-0">API Key</label>
                <input type="text" class="form-control me-2" value="<?= $userinfo['API_Key'] ?>" disabled style="max-width: 450px;">
                <a href="javascript:void(0);" id="btnGenAPI" class="btn btn-warning btn-sm">Lấy API Key Mới</a>
            </div>
        </div>
    </div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/footer.php";
?>
<script>
    $(document).ready(function() {
        $("#btnGenAPI").click(function(e) {
            e.preventDefault(); // Ngăn form submit mặc định
            let name = $("#name").val();
            let SaveBtn = $("#btnGenAPI");

            // Hiển thị loading và disable nút
            SaveBtn.prop("disabled", true).html('<i class="fas fa-spinner fa-spin"></i> Đang lấy api key...').addClass("btn-secondary").removeClass("btn-warning");
            console.log('<?= $sign ?>');
            $.ajax({
                url: "<?= $base_url ?>backend/user/profile",
                type: "POST",
                data: {
                    type: "genapi",
                    username: '<?= $username ?>',
                    sign: "<?= $sign ?>"
                },
                dataType: "json", // Đọc JSON từ PHP
                success: function(response) {
                    if (response.status === 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Thành công!",
                            text: response.msg,
                            time: 1500
                        }).then(() => {
                            window.location.href = "<?= hUrl('Profile') ?>"; // Điều hướng sau khi đăng nhập
                        });
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
                        text: xhr.responseJSON?.msg
                    });
                }
            });
            SaveBtn.prop("disabled", false).text("Lấy API Key Mới");
        });
    });
</script>