<?php
include_once 'lib/session.php';
Session::checkSession('client');
include_once 'classes/cart.php';
include_once 'classes/orderDetails.php';

$cart = new cart();
$orderDetails = new orderDetails();

$totalQty = $cart->getTotalQtyByUserId();
$result = $orderDetails->getOrderDetails($_GET['orderId']);
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
    <title>Order</title>
    <style type="text/css">
        .featuredProducts{
          text-align: center;
          background-color: #D70018;
          color: white;

        }
        .container-single{
          display: flex;
          margin: 30px 100px;
        }
        .order{
          width: 100%;
          background-color: ghostwhite;
          padding: 10px;
          border-collapse: collapse;
          font-size: 16px;
          border: 1px solid black;
          padding: 10px;
          text-align: center;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div style="height:100px"></div>
    <div class="featuredProducts">
        <h1>Chi tiết đơn hàng <?= $_GET['orderId'] ?></h1>
    </div>
    <div class="container-single">
        <table class="order">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
            </tr>
            <?php $count = 1;
            foreach ($result as $key => $value) { ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><a href="detail.php?id=<?= $value['productId'] ?>"><?= $value['productName'] ?></a></td>
                    <td><img class="image-cart" width="228px" src="admin/uploads/<?= $value['productImage'] ?>" alt=""></td>
                    <td><?= number_format($value['productPrice'], 0, '', ',') ?>VND</td>
                    <td><?= $value['qty'] ?></td>
                </tr>
            <?php }
            ?>
        </table>

    </div>
    </div>
    <?php include 'footer.php'; ?> 
</body>

</html>