<?php
$title = "Hướng dẫn sử dụng API Phát Nhạc";
$title_page = "Hướng dẫn API Phát Nhạc";
$des_page = "Chi tiết cách sử dụng API và các mã trạng thái.";
include $_SERVER['DOCUMENT_ROOT'] . "/modules/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/head.php";
include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/nav.php";
?>

<div class="container mt-5">
    <h2 class="text-center"><?= $title_page ?></h2>
    <p class="text-center"><?= $des_page ?></p>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Cấu trúc API</h5>
        </div>
        <div class="card-body">
            <p>API được sử dụng để phát nhạc MP3.</p>
            <p><strong>Endpoint:</strong></p>
            <code><?= $base_url ?>backend/youtube/music</code>
            <p class="mt-3"><strong>Phương thức:</strong> <code>GET</code></p>

            <p><strong>Tham số yêu cầu:</strong></p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tham số</th>
                        <th>Bắt buộc</th>
                        <th>Loại</th>
                        <th>Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>api_key</code></td>
                        <td><span class="badge bg-danger">Có</span></td>
                        <td>String</td>
                        <td>API Key hợp lệ</td>
                    </tr>
                    <tr>
                        <td><code>id_video</code></td>
                        <td><span class="badge bg-danger">Có</span></td>
                        <td>String</td>
                        <td>ID của file MP3 cần phát</td>
                    </tr>
                </tbody>
            </table>

            <p class="mt-3"><strong>Ví dụ truy vấn:</strong></p>
            <code><?= $base_url ?>backend/youtube/music?api_key=123abc&id_video=y8hKABnudDA</code>

            <p class="mt-3"><strong>Kết quả trả về:</strong></p>
            <pre>
{
    "status": 1,
    "message": "Success",
    "file_url": "<?= $base_url ?>Data/y8hKABnudDA.mp3"
}
            </pre>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-warning">
            <h5>Mã trạng thái API</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Ý nghĩa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>1</code></td>
                        <td>Thành công</td>
                    </tr>
                    <tr>
                        <td><code>2</code></td>
                        <td>Thiếu API key hoặc id_video</td>
                    </tr>
                    <tr>
                        <td><code>3</code></td>
                        <td>API Key không hợp lệ</td>
                    </tr>
                    <tr>
                        <td><code>5</code></td>
                        <td>ID video không hợp lệ</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h5>Demo sử dụng API</h5>
        </div>
        <div class="card-body">
            <form id="musicForm">
                <div class="mb-3">
                    <label class="form-label">API Key</label>
                    <input type="text" id="apiKey" class="form-control" placeholder="Nhập API Key">
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Video</label>
                    <input type="text" id="videoId" class="form-control" placeholder="Nhập ID video">
                </div>
                <button type="submit" class="btn btn-primary w-100">Lấy Link MP3</button>
            </form>
            <div class="mt-3" id="apiResult"></div>
        </div>
    </div>
</div>

<script>
    document.getElementById("musicForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let apiKey = document.getElementById("apiKey").value.trim();
        let videoId = document.getElementById("videoId").value.trim();

        if (!apiKey || !videoId) {
            alert("Vui lòng nhập đầy đủ API Key và ID Video!");
            return;
        }

        let apiUrl = `<?= $base_url ?>backend/youtube/music?api_key=${apiKey}&id_video=${videoId}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                let output = "<h3>Kết quả:</h3>";
                if (data.status === 1) {
                    output += `<p class='text-success'>API hoạt động bình thường!</p>`;
                    output += `<audio controls><source src="${data.file_url}" type="audio/mpeg"></audio>`;
                } else {
                    output += `<p class='text-danger'>Lỗi: ${data.message}</p>`;
                }
                document.getElementById("apiResult").innerHTML = output;
            })
            .catch(error => {
                document.getElementById("apiResult").innerHTML = `<p class='text-danger'>Lỗi truy vấn API!</p>`;
                console.error("Lỗi:", error);
            });
    });
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/footer.php"; ?>
