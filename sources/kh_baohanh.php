<?php
if (!defined('SOURCES')) die("Error");

require_once 'vendor/autoload.php'; // Đường dẫn đến file autoload.php của thư viện Google API

// Xác thực và phân quyền
$client = new Google_Client();
$client->setAuthConfig('./client_credentials.json'); // Đường dẫn đến file JSON chứa thông tin xác thực
$client->addScope(Google_Service_Drive::DRIVE); // Phân quyền truy cập Google Drive

// Kiểm tra xem token đã tồn tại hay chưa, nếu không thì yêu cầu xác thực
// var_dump(file_exists('./token.json'));die();
if (file_exists('./token.json')) {
    $accessToken = json_decode(file_get_contents('token.json'), true);
    $client->setAccessToken($accessToken);
} else {
    var_dump($client->createAuthUrl());
    $authUrl = $client->createAuthUrl();
    printf("Open the following link in your browser:\n%s\n", $authUrl);
    print 'Enter verification code: ';
    $authCode = trim(fgets(STDIN));
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    $client->setAccessToken($accessToken);
    var_dump("ccc");die();
    // Lưu token truy cập để sử dụng lần sau
    if (!file_exists(dirname('/token.json'))) {
        mkdir(dirname('/token.json'), 0700, true);
    }
    file_put_contents('/token.json', json_encode($accessToken));
}

// Đọc dữ liệu từ file Excel trên website
// Code xử lý việc này tại đây

// Tạo service Google Drive
$service = new Google_Service_Drive($client);

// Tạo hoặc cập nhật file trên Google Docs
$fileMetadata = new Google_Service_Drive_DriveFile(array(
    'name' => 'check SN',
    'mimeType' => 'application/vnd.google-apps.document'
));

$content = file_get_contents('https://docs.google.com/spreadsheets/d/1WDAXck8Ttnw9kGDwmzUtPRWtlMcJURcrm15i3nEAvok/'); // Đường dẫn đến file Excel

$file = $service->files->create($fileMetadata, array(
    'data' => $content,
    'mimeType' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'uploadType' => 'multipart',
    'fields' => 'id'
));

printf("File ID: %s\n", $file->id);
