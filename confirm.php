<?php
include 'classes/user.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new user();
    $result = $user->confirm($_POST['userId'], $_POST['captcha']);
    if ($result === true) {
        echo '<script type="text/javascript">alert("Xác minh tài khoản thành công!");</script>';
        header("Location: login.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <title>Xác minh Email</title>
    <style type="text/css">
        
        .container{
            width: 100%;
            text-align: center;
        }

        .featuredProducts h1{
            font-size: 50px;
        }

        #captcha{
            width: 200px;
            height: 29px;
        }
        
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div style="height:150px"></div>
    <div class="container">
        <div class="featuredProducts">
            <h1>Xác minh Email</h1>
        </div>
        <div class="container-single">
            <div class="login">
                <b class="error"><?= !empty($result) ? $result : '' ?></b>
                <form action="confirm.php" method="post" class="form-login">
                    <input type="text" id="userId" name="userId" hidden style="display: none;" value="<?= (isset($_GET['id'])) ? $_GET['id'] : $_POST['userId'] ?>">
                    <input type="text" id="captcha" name="captcha" placeholder="Mã xác minh...">
                    <input type="submit" class="form-submit" style="width:200px !important
                    " value="Xác minh" name="submit">
                </form>
            </div>
        </div>
    </div>
    <div style="height:160px"></div>
    <?php include 'footer.php'; ?>
</body>

</html>