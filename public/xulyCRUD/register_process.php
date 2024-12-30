<?php
require "../../config.php";
require "../models/db.php";
require "../models/user.php";
$users = new User();

if (isset($_POST['submit'])) {
    // Nhận dữ liệu từ form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if ($password !== $confirm_password) {
    header('location:../../register.php?messagethongbao=mật khẩu không trùng khớp!!');
    exit();
}
$check = $users->KiemTraUserDangKy($username,$email);
if ($check) {
    header('location:../../register.php?messagethongbao=Tên người dùng hoặt email đã tồn tại!!');
    exit();
}else{
    $dangky = $users->DangKy($username,$password,$email,0);
if ($dangky) {
    header('location:../../login.php?messagethongbao=Đăng ký tài khoản thành công!!');
    exit();
}
}

}



// // Kiểm tra nếu mật khẩu và xác nhận mật khẩu không khớp


// // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
// $password_hashed = password_hash($password, PASSWORD_BCRYPT);

// // Kiểm tra xem tên người dùng hoặc email đã tồn tại chưa
// $sql_check = "SELECT * FROM users WHERE username = ? OR email = ?";
// $stmt = $conn->prepare($sql_check);
// $stmt->bind_param("ss", $username, $email);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     die("<h2 style='color: red; text-align: center;'>Tên người dùng hoặc email đã tồn tại!</h2>");
// }

// // Chèn dữ liệu vào bảng users
// $sql_insert = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
// $stmt = $conn->prepare($sql_insert);
// $stmt->bind_param("sss", $username, $password_hashed, $email);

// if ($stmt->execute()) {
//     echo "<h2 style='color: green; text-align: center;'>Đăng ký thành công!</h2>";
//     echo "<p style='text-align: center;'><a href='login.php'>Đăng nhập ngay</a></p>";
// } else {
//     echo "<h2 style='color: red; text-align: center;'>Đăng ký thất bại. Vui lòng thử lại!</h2>";
// }

// // Đóng kết nối
// $conn->close();
?>
