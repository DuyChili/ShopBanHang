<?php
session_start(); 
require "../../config.php";
require "../models/db.php";
require "../models/user.php";
$users = new User();

if (isset($_POST['submit'])) {
// Nhận dữ liệu từ form
$username = $_POST['username'];
$password = $_POST['password'];

$check = $users->KiemTraUser($username);
if ($check) {
    $dangnhap = $users->DangNhap($username,$password);
    if ($dangnhap) {
        $_SESSION['user_id'] = $dangnhap['id'];
        $_SESSION['username'] = $dangnhap['username'];
        $_SESSION['role'] = $dangnhap['role'];
        $_SESSION['email'] = $dangnhap['email'];
        header('location:../../index.php?messagethongbao=Xin Chào Bạn'.$_SESSION['username'].'!!');
        exit();
    }
    else{
        header('location:../../login.php?messagethongbao=mật khẩu không đúng!!');
        exit();
    }
}
else{
     // Chuyển hướng kèm theo thông báo
   header('location:../../login.php?messagethongbao=Tên hoặc mật khẩu không đúng!!');
   exit();
}

}
?>
