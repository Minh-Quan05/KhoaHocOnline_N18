<?php
session_start();

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
    $password = $_POST['password'];

    // Kiểm tra tài khoản
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Đăng nhập thành công
            exit();
        } else {
            echo "Sai mật khẩu!";
        }
    } else {
        echo "Tài khoản không tồn tại!";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Phương thức không hợp lệ!";
}
?>
