from flask import Flask, request, jsonify
import os
import yt_dlp
import logging

app = Flask(__name__)

# Cấu hình log
LOG_FILE = "download_log.txt"
DOWNLOAD_FOLDER = "downloads"
SESSION_FILE = "session_count.txt"

if not os.path.exists(DOWNLOAD_FOLDER):
    os.makedirs(DOWNLOAD_FOLDER)

# Cấu hình logging để ghi vào cả file và console
logger = logging.getLogger("DownloadLogger")
logger.setLevel(logging.INFO)

# Ghi log ra console
console_handler = logging.StreamHandler()
console_handler.setLevel(logging.INFO)
console_format = logging.Formatter("%(asctime)s - %(message)s", "%H:%M:%S")
console_handler.setFormatter(console_format)

# Ghi log ra file
file_handler = logging.FileHandler(LOG_FILE, mode="a", encoding="utf-8")
file_handler.setLevel(logging.INFO)
file_format = logging.Formatter("%(asctime)s - %(message)s", "%Y-%m-%d %H:%M:%S")
file_handler.setFormatter(file_format)

# Thêm handler vào logger
logger.addHandler(console_handler)
logger.addHandler(file_handler)

# Hàm đọc và cập nhật số phiên tải xuống
def update_session_count():
    if not os.path.exists(SESSION_FILE):
        with open(SESSION_FILE, "w") as f:
            f.write("0")

    with open(SESSION_FILE, "r+") as f:
        count = int(f.read().strip()) + 1
        f.seek(0)
        f.write(str(count))
        f.truncate()
    
    return count

@app.route('/download', methods=['GET'])
def download_video():
    video_id = request.args.get('id')
    
    if not video_id:
        logger.info("[❌] Sai ID!")
        return jsonify({"status": 2, "message": "Sai ID!"}), 400

    session_number = update_session_count()
    try:
        video_url = f"https://www.youtube.com/watch?v={video_id}"
        mp3_path = os.path.join(DOWNLOAD_FOLDER, f"{video_id}.mp3")

        logger.info(f"[{session_number}] Nhận yêu cầu tải xuống: {video_id}")
        logger.info(f"    - URL: {video_url}")

        # Cấu hình yt-dlp để tải MP3
        ydl_opts = {
            'format': 'bestaudio/best',
            'postprocessors': [{
                'key': 'FFmpegExtractAudio',
                'preferredcodec': 'mp3',
                'preferredquality': '192',
            }],
            'ffmpeg_location': 'F:\\ffmpeg\\bin\\ffmpeg.exe',  # Đường dẫn FFmpeg
            'outtmpl': os.path.join(DOWNLOAD_FOLDER, '%(id)s.%(ext)s'),
            'quiet': True  # Tắt log yt-dlp
        }

        logger.info(f"[{session_number}] [*] Đang tải xuống...")
        with yt_dlp.YoutubeDL(ydl_opts) as ydl:
            ydl.extract_info(video_url, download=True)

        # Kiểm tra file có tồn tại không
        if os.path.exists(mp3_path):
            logger.info(f"[{session_number}] [✔] Tải xuống hoàn tất!")
            return jsonify({"status": 1, "message": "Thành công!", "video_id": video_id, "file_path": mp3_path})

        logger.info(f"[{session_number}] [❌] Lỗi: File không tồn tại sau khi tải.")
        return jsonify({"status": 99, "message": "Lỗi hệ thống! File không tồn tại."}), 500

    except Exception as e:
        logger.info(f"[{session_number}] [❌] Lỗi hệ thống: {str(e)}")
        return jsonify({"status": 99, "message": str(e)}), 500

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=89, debug=False)
