<?php
class User extends db{


    public function DangNhap($username,$password){
     $sql = self::$connection->prepare("SELECT * FROM users WHERE username = ?");
     $sql->bind_param("s", $username);
     $sql->execute();
     $result = $sql->get_result();
     if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user;
            return true;
        }
        else{
            return false;
        }
     }
     
    }
    public function DangKy($username, $password, $email, $role) {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        
        // Chèn dữ liệu vào bảng users
        $sql = self::$connection->query("INSERT INTO `users` (`username`, `password`, `email`, `role`) VALUES ('$username', '$password_hashed', '$email', $role)");
    
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }
    

    public function KiemTraUser($username){
        // Kiểm tra xem tên người dùng hoặc email đã tồn tại chưa
$sql = self::$connection->prepare("SELECT * FROM users WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    return true;
}
else{
    return false;
}
    }

    public function KiemTraUserDangKy($username,$email){

$sql = self::$connection->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$sql->bind_param("ss", $username, $email);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    return true;
}
    }
}

?>