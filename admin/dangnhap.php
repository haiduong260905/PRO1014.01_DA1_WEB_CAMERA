<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb20">Đăng Nhập</h2>

            <form id="loginForm" class="form-login">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username"><br><br>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password"><br><br>

                <input type="submit" value="Đăng Nhập">
            </form>
        </div>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Fix gửi form mặc định

            // Lấy giá trị người dùng nhập vào
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            // Kiểm tra thông tin đăng nhập
            if (username === "admin" && password === "123") {
                // Nếu thông tin đúng, chuyển hướng đến trang index.php
                window.location.href = "index.php";
            } else {
                alert("Tên người dùng hoặc mật khẩu không đúng. Vui lòng thử lại.");
            }
        });
    </script>
</body>

</html>