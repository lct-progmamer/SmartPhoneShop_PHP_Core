<?php
include_once 'lib/session.php';
include_once 'classes/product.php';
include_once 'classes/categories.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();

$category = new categories();
$listCategories = $category->getAll();


$product = new product();
$listSoldMax = $product->getProductSoldMax();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="js/fontawesome.min.js">
    <link rel="stylesheet" href="css/css2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,600;0,800;1,200;1,400;1,600;1,800&display=swap"
        rel="stylesheet">
    <title>SmartPhones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

    <?php include 'header.php'; ?>
    <div style="height: 20px;">
    </div>

    <!-- menu -->
    <div id="slider" class="container">
        <div class="row" style="margin: 0px">
            <div id="menu-1" class="col-lg-2 d-none d-sm-block">
                <div class="menu-1-list">
                    <ul class="list-menu">
                        <?php foreach ($listCategories as $key => $value) { ?>
                            <li style="padding-left: 10px;">
                                <a style="width: 100%;" href="productList.php?cateId=<?= $value['id'] ?>">
                                    <?= $value['name'] ?>      
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div id="menu-2" class="col-lg-7 d-none d-sm-block">

                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/24.png" alt="banner-1" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="images/22_1.png" alt="banner-2" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="images/25_1.png" alt="banner-3" class="d-block w-100">
                        </div>
                    </div>

                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div id="menu-3" class="col-lg-3 d-none d-sm-block"
                style="display: flex; flex-direction: column; justify-content: space-around;">
                <div>
                    <a href="#"><img src="images/1.png" class="d-block w-100"></a>
                </div>
                <div>
                    <a href="#"><img src="images/2.png" class="d-block w-100"></a>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 30px;">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-none d-sm-block">
                <a href="#">
                    <img src="images/bannerNgang.png" alt=""
                        style="width: 100%; border-radius: 5px; box-shadow: 4px 2px 4px 2px #aaaaaa;"></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 d-block d-sm-none">
                <a href="#"><img src="images/image 2.png" alt=""
                        style="width: 100%; border-radius: 5px; box-shadow: 4px 2px 4px 2px #aaaaaa;"></a>
            </div>
        </div>
    </div>
    <div style="height: 25px;">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-none d-sm-block">
                <h5 style="font-size: 20px;">SẢN PHẨM BÁN CHẠY</h5>
                <ul class="spnew">
                    <?php  foreach ($listSoldMax as $key => $value) { ?>
                        <li>
                            <a style="text-decoration: none;" href="detail.php?id=<?= $value['id'] ?>">
                                <img src="admin/uploads/<?=$value['image']?>" style="width:228px;" alt="">
                                <br>
                                <p style="color:red;font-style: italic;font-size: 15px;">Giảm giá 
                                    <?= 
                                    ceil(($value['originalPrice'] - $value['promotionPrice'])/$value['originalPrice'] * 100)?> %
                                </p>
                                
                                <p class="name"><strong style="color: #444;font-size: 14px;"><?= $value['name'] ?></strong></p>
                        
                                <p>
                                    <strong>
                                        <h3><?= number_format($value['promotionPrice'], 0, '', ',')?></h3>
                                    </strong>
                                    <del>
                                        <h3>
                                            <?php
                                                if ($value['promotionPrice'] < $value['originalPrice']) { ?>
                                            <del><?= number_format($value['originalPrice'], 0, '', ',') ?>VND</del>
                                            <?php } else { ?>
                                            <p></p>
                                            <?php } ?>
                                        </h3>
                                    </del>
                                </p>
                                <div id="button" style="height: 40px;width: 100%;">
                                    <a id="button-add-cart" href="add_cart.php?id=<?= $value['id'] ?>">         Thêm vào giỏ
                                    </a>
                                    <a id="button-detail" href="    ">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <style type="text/css">
        #button a{
          text-decoration: none;
        }
        #button-add-cart , #button-detail{
          padding : 5px ;
          height: 30px;
          width: 50%;
          background-color: #FB6E2E;
          border-radius: 8px;
          text-decoration: none;
          color:#fff;
        }
        #button-add-cart{
          background-color: #2F80ED;
        }
        #button-detail{
          background-color: #FB6E2E;
        }
        .xem-tat-ca:hover{
            color: blue;
        }
    </style>


    <script lang="Javascript">
    $('.spnew').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,

        prevArrow: '<i class="fa fa-angle-left left-arrow" style="line-height: 2.8;cursor: pointer;">',
        nextArrow: '<i class="fa fa-angle-right right-arrow" style="line-height:2.8;cursor:pointer;">'
    });
    </script>


    <!-- PRODUCT LIST -->

    <div class="container">
        <div class="spnb d-none d-sm-block">
            <?php foreach ($listCategories as $key => $value) { ?>
                <br>
                <div class="row">
                    <a class="col-lg-1" href="#">
                        <h5 style="margin-left: 0px;font-size: 20px;"><?= $value['name'] ?></h5>
                    </a>
                    <a class="col-lg-9" href="#"></a>
                    <a class="col-lg-2 xem-tat-ca" style="font-size:16px" href="productList.php?cateId=<?= $value['id'] ?>">Xem tất cả >>></a>
                </div>
                <br>
                <div class="row">
                    <?php
                        $listPhone = $product->getProductsByCateId(1,$value['id'],4);
                        foreach ($listPhone as $key => $value) { 
                    ?>
                        <div class="col-lg-3">
                            <a href="detail.php?id=<?= $value['id'] ?>">      
                                <img src="admin/uploads/<?= $value['image']?>" style="width:228px;" alt="">
                                <p class="name"><strong style="color: #444;font-size: 14px;">
                                    <?= $value['name']?>
                                <br>   I Chính hãng VN/A</strong></p>
                                <p>
                                    <strong>
                                        <h3><?= number_format($value['promotionPrice'], 0, '', ',')?></h3>
                                    </strong>
                                    <del>
                                        <h3>
                                            <?php
                                                if ($value['promotionPrice'] < $value['originalPrice']) { ?>
                                            <del><?= number_format($value['originalPrice'], 0, '', ',') ?>VND</del>
                                            <?php } else { ?>
                                            <p></p>
                                            <?php } ?>
                                        </h3>
                                    </del>
                                </p>
                                <div id="button" style="height: 40px;width: 100%;">
                                    <a id="button-add-cart" href="add_cart.php?id=<?= $value['id'] ?>">         Thêm vào giỏ
                                    </a>
                                    <a id="button-detail" href="detail.php?id=<?= $value['id'] ?>">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>


    <br><br>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>
</body>
</html>