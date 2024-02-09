<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $valid_username = 'example_user';
        $valid_password = 'example_password';
        if ($username === $valid_username && $password === $valid_password) {

            header("Location: trangchu.php");
            exit;
        } else {

            echo "Tài khoản k tồn tại!";
        }
    }
    ?>
    <div class="login-container">
        <form action="index.php" method="post">
            <label for="username">Tên người dùng</label><br>
            <input type="text" id="username" name="username" placeholder="nhập tên tài khoản" required><br>
            <label for="password">Mật khẩu</label><br>
            <input type="password" id="password" name="password" placeholder="nhập mật khẩu" required><br>
            <input type="submit" value="Đăng nhập">
        </form>
    </div>
</body>

</html>