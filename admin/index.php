<?php
    include '../lib/session.php';
    Session::checkSession('admin');
    $role_id = Session::get('role_id');
    if ($role_id == 1) {
        header("Location: productlist.php");
        
    } else {
        header("Location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <footer>
        <div class="social">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Product</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
        </ul>
        <p class="copyright">NHÓM 8</p>
    </footer>
</body>

</html>