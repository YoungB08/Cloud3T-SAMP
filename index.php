<?php
$title = 'Trang chủ';
$title_page = 'Trang chủ';
$des_page = '';
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/nav.php";
?>

<ul class="timeline">
    <li>
        <div class="timeline-badge success">
            <img src="https://i.imgur.com/6VBx3io.png" alt="QTV">
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Thông báo từ Admin</h4>
                <small class="text-muted"><i class="fas fa-clock"></i> 2025-03-08 14:30</small>
            </div>
            <div class="timeline-body">
                <p>🔧 Hệ thống sẽ bảo trì vào 10:00 ngày mai!</p>
            </div>
        </div>
    </li>

    <li class="timeline-inverted">
        <div class="timeline-badge warning">
            <img src="https://i.imgur.com/3G3jI6m.png" alt="QTV">
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title">Thông báo từ Mod</h4>
                <small class="text-muted"><i class="fas fa-clock"></i> 2025-03-07 18:15</small>
            </div>
            <div class="timeline-body">
                <p>🔒 Vui lòng cập nhật mật khẩu để bảo mật tài khoản.</p>
            </div>
        </div>
    </li>
</ul>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/footer.php";
?>