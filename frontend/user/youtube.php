<?php
$title = "Hướng dẫn sử dụng API YouTube";
$title_page = "Hướng dẫn API YouTube";
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
            <p>API được sử dụng để tìm kiếm video trên YouTube.</p>
            <p><strong>Endpoint:</strong></p>
            <code><?= $base_url ?>backend/youtube/search</code>
            <p class="mt-3"><strong>Phương thức:</strong> <code>GET</code></p>

            <div class="alert alert-info">
                <strong>Lưu ý:</strong> Mỗi lần truy vấn API sẽ trừ <strong>100 VNĐ</strong> từ tài khoản của bạn.
            </div>

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
                        <td><code>key</code></td>
                        <td><span class="badge bg-danger">Có</span></td>
                        <td>String</td>
                        <td>API Key hợp lệ</td>
                    </tr>
                    <tr>
                        <td><code>search</code></td>
                        <td><span class="badge bg-danger">Có</span></td>
                        <td>String</td>
                        <td>Từ khóa tìm kiếm</td>
                    </tr>
                    <tr>
                        <td><code>limit</code></td>
                        <td><span class="badge bg-success">Không</span></td>
                        <td>Integer</td>
                        <td>Số lượng kết quả trả về (mặc định: 10)</td>
                    </tr>
                </tbody>
            </table>

            <p class="mt-3"><strong>Ví dụ truy vấn:</strong></p>
            <code><?= $base_url ?>backend/youtube/search?key=abc123xyz&search=GTA+SA&limit=5</code>

            <p class="mt-3"><strong>Kết quả trả về (JSON):</strong></p>
            <pre>
{
    "status": 1,
    "apikey": "abc123xyz",
    "sign": "xxxxxx",
    "query": "GTA SA",
    "msg": "Success",
    "data": [
        {
            "Title": "GTA SA Gameplay",
            "Channel": "Rockstar Games",
            "Link": "https://www.youtube.com/watch?v=xxxxx"
        },
        ...
    ]
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
                        <td><code>90</code></td>
                        <td>Không có dữ liệu search</td>
                    </tr>
                    <tr>
                        <td><code>95</code></td>
                        <td>Chưa input tìm kiếm</td>
                    </tr>
                    <tr>
                        <td><code>98</code></td>
                        <td>API Key không tồn tại</td>
                    </tr>
                    <tr>
                        <td><code>99</code></td>
                        <td>API chưa input</td>
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
            <form id="searchForm">
                <div class="mb-3">
                    <label class="form-label">Nhập từ khóa tìm kiếm</label>
                    <input type="text" id="searchQuery" class="form-control" placeholder="Ví dụ: GTA SA">
                </div>
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
            </form>
            <div class="mt-3" id="apiResult"></div>
        </div>
    </div>
</div>

<script>
    document.getElementById("searchForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let searchQuery = document.getElementById("searchQuery").value.trim();
        if (!searchQuery) {
            alert("Vui lòng nhập từ khóa tìm kiếm!");
            return;
        }

        let apiUrl = `<?= $base_url ?>backend/youtube/search?key=531869b6b36bc35a92aaa4c8f1f2721a&search=${encodeURIComponent(searchQuery)}&limit=10`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                let output = "<h3>Kết quả:</h3>";
                if (data.status === 1) {
                    output += "<ul class='list-group'>";
                    data.data.forEach(video => {
                        output += `
                        <li class="list-group-item">
                            <strong>${video.Title}</strong> - ${video.Channel}<br>
                            <a href="${video.Link}" target="_blank">${video.Link}</a>
                        </li>
                    `;
                    });
                    output += "</ul>";
                } else {
                    output += `<p class="text-danger">${data.msg}</p>`;
                }
                document.getElementById("apiResult").innerHTML = output;
            })
            .catch(error => {
                document.getElementById("apiResult").innerHTML = `<p class="text-danger">Lỗi truy vấn API!</p>`;
                console.error("Lỗi:", error);
            });
    });
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/frontend/website/footer.php"; ?>