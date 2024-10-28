<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Đăng nhập thành công, chuyển hướng đến trang khác
        header("Location: index.html");
        exit();
    } else {
        echo "Sai mật khẩu!";
    }
} else {
    echo "Email không tồn tại!";
}

$conn->close();
?>
