<?php
include_once 'lib/session.php';
Session::checkSession('client');
include_once 'classes/cart.php';
include_once 'classes/user.php';

$cart = new cart();
$list = $cart->get();
$totalPrice = $cart->getTotalPriceByUserId();
$totalQty = $cart->getTotalQtyByUserId();

$user = new user();
$userInfo = $user->get();
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

</head>

<body>
    <?php include 'header.php'; ?>

    <div style="height: 100px;"></div>
    <div class="featuredProducts">
        <h1>Giỏ hàng</h1>
    </div>
    <div class="container-single">
        <?php
        if ($list) { ?>
            <table class="order">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                $count = 1;
                foreach ($list as $key => $value) { ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $value['productName'] ?></td>
                        <td>
                            <img class="image-cart" src="admin/uploads/<?= $value['productImage'] ?>" >
                        </td>
                        <td><?= number_format($value['productPrice'], 0, '', ',') ?>VND </td>
                        <td>
                            <input id="<?= $value['productId'] ?>" type="number" name="qty" class="qty" value="<?= $value['qty'] ?>" onchange="update(this)" min="1">
                        </td>
                        <td>
                            <a href="delete_cart.php?id=<?= $value['id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </table>
            <div class="orderinfo">
                <div class="buy">
                    <h3>Thông tin đơn đặt hàng</h3>
                    <div>
                        Người đặt hàng: <b><?= $userInfo['fullname'] ?></b>
                    </div>
                    <div>
                        Số lượng: <b id="qtycart"><?= $totalQty['total'] ?></b>
                    </div>
                    <div>
                        Tổng tiền: <b id="totalcart"><?= number_format($totalPrice['total'], 0, '', ',') ?>VND</b>
                    </div>
                    <div>
                        Địa chỉ nhận hàng: <b><?= $userInfo['address'] ?></b>
                    </div>
                    <div class="buy-btn" align="center">
                        <a href="add_order.php">Tiến hành đặt hàng</a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <h3>Giỏ hàng hiện đang rỗng</h3>
        <?php }
        ?>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
<script type="text/javascript">
    function update(e) {
        var http = new XMLHttpRequest();
        var url = 'update_cart.php';
        var params = "productId=" + e.id + "&qty=" + e.value;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if (http.readyState === XMLHttpRequest.DONE) {
                var status = http.status;
                if (status === 200) {
                    var arr = http.responseText;
                    var b = false;
                    var result = "";
                    for (let index = 0; index < arr.length; index++) {
                        if (arr[index] == "[") {
                            b = true;
                        }
                        if (b) {
                            result += arr[index];
                        }
                    }
                    var arrResult = JSON.parse(result.replace("undefined", ""));
                    console.log(arrResult);
                    document.getElementById("totalQtyHeader").innerHTML = arrResult[1]['total'];
                    document.getElementById("qtycart").innerHTML = arrResult[1]['total'];
                    document.getElementById("totalcart").innerHTML = arrResult[0]['total'].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + "VND";

                    //alert('Đã cập nhật giỏ hàng!');
                } else if (status === 501) {
                    alert('Số lượng sản phẩm không đủ để thêm vào giỏ hàng!');
                    e.value = parseInt(e.value) - 1;
                } else {
                    alert('Cập nhật giỏ hàng thất bại!');
                    window.location.reload();
                }
            }

        }
        http.send(params);
    }

    var list = document.getElementsByClassName("qty");
    for (let item of list) {
        item.addEventListener("keypress", function(evt) {
            evt.preventDefault();
        });
    }
</script>
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
        }
        .image-cart{
          height: 200px;
          width: 200px;
        }
        .orderinfo{
          margin-left: 20px;
          background-color: ghostwhite;
          padding: 10px;
          font-size: 16px;
        }
        .buy-btn{
          /*float: right;*/
          margin-top: 50px;
          height: 40px;
          width: 200px;
          text-align: center;
          line-height: 40px;
          background-color: green;
          border-radius: 5px;
          color: #fff;
        }

        .buy-btn a{
          color: #fff;
          text-decoration: none;
        }

        .buy-btn a:hover{
          color: #fff;
          background-color: green;
        }
    </style>

</html>