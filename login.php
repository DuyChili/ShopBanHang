<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        /* Tạo hiệu ứng gradient cho nền trang */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2193b0, #6dd5ed); /* Gradient từ #2193b0 đến #6dd5ed */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Tạo hiệu ứng gradient cho cả bảng đăng nhập */
        .login-box {
            background: linear-gradient(to right, #2193b0, #6dd5ed); /* Gradient giống nền trang */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            color: black; /* Đổi màu chữ thành trắng để dễ đọc trên nền tối */
            position: relative; /* Để có thể định vị nút thoát ở góc phải */
        }

        .login-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color:  #6dd5ed;
            color: black;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2193b0;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }
        
        /* Nút Thoát */
        .exit-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(to right, #2193b0, #6dd5ed); /* Tạo gradient giống khung */
            color: black;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px; /* Tạo viền bo tròn cho nút */
        }

        .exit-btn:hover {
            background: linear-gradient(to right, #6dd5ed, #2193b0); /* Đảo ngược gradient khi hover */
        }
        
    </style>
</head>
<body>

    <div class="login-box">
        <!-- Nút Thoát -->
        <button class="exit-btn" onclick="window.location.href='index.php';">Thoát</button>
        
        <div class="login-header">ĐĂNG NHẬP</div>

        <?php
        session_start();
        // Hiển thị thông báo nếu có
        if (isset($_SESSION['success_message'])) {
            echo "<div class='message'>" . $_SESSION['success_message'] . "</div>";
            unset($_SESSION['success_message']); // Xóa thông báo sau khi đã hiển thị
        }
        ?>

        <form method="post" action="public/xulyCRUD/login_process.php">
            <div class="form-group">
                <label for="username" class="form-label">Tên người dùng</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn">Đăng Nhập</button>
        </form>
        <div class="forgot-password">
            <a href="#">Quên mật khẩu?</a>
        </div>
        <div style="text-align: center; margin-top: 15px;">
            <a href="register.php">Chưa có tài khoản? Đăng ký</a>
        </div>
    </div>
    <?php
if (isset($_GET['messagethongbao'])) {
    $message = $_GET['messagethongbao'];
    echo "<script>alert('$message');</script>";
}
    ?>
</body>
</html>
