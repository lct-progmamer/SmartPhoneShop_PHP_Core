<?php
include 'classes/user.php';
$user = new user();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $login_check = $user->login($email, $password);
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Đăng Nhập</title>    
<head>
</head>

<body>    
    <?php include 'header.php'; ?>
   <div id="wrapper">
        <form action="login.php" id="form-login" method="POST">
            <h1 class="form-heading">ĐĂNG NHẬP</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="email" name="email" class="form-input"  required placeholder="Email">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" name="password" id="ipnPassword" class="form-input" required  placeholder="Password">
                
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>

            </div>
            <p style="color: red;font-size: 12px;"><?= !empty($login_check) ? $login_check : '' ?></p>
            <input type="submit" value="Đăng nhập" class="form-submit">
            <div class="link-to-register">
                <a href="register.php">Tạo tài khoản</a>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        const ipnElement = document.querySelector('#ipnPassword')
        const btnElement = document.querySelector('#eye')
        btnElement.addEventListener('click', function() {
        const currentType = ipnElement.getAttribute('type')
        ipnElement.setAttribute(
            'type',
            currentType === 'password' ? 'text' : 'password'
          )
        })

    </script>
    <?php include 'footer.php'; ?>

</body>

</html>