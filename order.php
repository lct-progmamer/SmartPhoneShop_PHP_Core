<?php
    include_once 'lib/session.php';
    Session::checkSession('client');
    include 'classes/order.php';
    include_once 'classes/cart.php';

    $cart = new cart();
    $totalQty = $cart->getTotalQtyByUserId();

    $order = new order();
    $result = $order->getOrderByUser();
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
    <title>Giỏ hàng</title>
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
    <div class="featuredProducts">
        <h1>Đơn hàng</h1>
    </div>
    <div style="height:100px"></div>
    <div class="container-single">
        <?php if ($result) { ?>
            <table class="order">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Ngày giao</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
                <?php $count = 1;
                foreach ($result as $key => $value) { ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['createdDate'] ?></td>
                        <td><?= ($value['status'] != "Processing") ? $value['receivedDate'] : "Dự kiến 3 ngày sau khi đơn hàng đã được xử lý" ?> <?=  ($value['status'] != "Complete" && $value['status'] != "Processing") ? "(Dự kiến)" : "" ?> </td>
                        <?php
                        if ($value['status'] == 'Delivering') { ?>
                            <td>
                                <a href="complete_order.php?orderId=<?= $value['id'] ?>">Đang giao (Click vào để xác nhận đã nhận)</a>
                            </td>
                            <td>
                                <a href="orderdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <?= $value['status'] ?>
                            </td>
                            <td>
                                <a href="orderdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        <?php }
                        ?>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h3 style="font-size:20px;color: red;">
                Đơn hàng hiện đang rỗng ==>
                <a href="index.php" style="text-decoration: none;">Quay lại mua hàng</a>
            </h3>
        <?php } ?>


    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>