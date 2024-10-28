<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ biểu mẫu
$name = $_POST['name'];
$ngaysinh = $_POST['ngaysinh'];
$sdt = $_POST['sdt'];
$email = $_POST['email'];
$address = $_POST['address'];
$quequan = $_POST['quequan'];

// Thêm dữ liệu vào bảng
$sql = "INSERT INTO students (name, ngaysinh ,sdt, email, address,quequan) VALUES ('$name', '$ngaysinh','$sdt', '$email', '$address','$quequan')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Thêm hồ sơ thành công!'); window.location.href = 'index.html';</script>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
