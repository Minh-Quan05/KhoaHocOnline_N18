<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kết nối cơ sở dữ liệu
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "user_database";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    // Thêm người dùng mới vào cơ sở dữ liệu
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo "Đăng ký thành công!";
    } else {
        echo "Đăng ký thất bại!";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Phương thức không hợp lệ!";
}
?>
