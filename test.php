<?php
$url = "http://localhost/backend/auth/register"; // Thay URL API của bạn
$data = [
    "username" => "testusxer",
    "password" => "123456",
    "email" => "123456",
    "sign" => "admin"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
