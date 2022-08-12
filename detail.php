<?php
include_once 'lib/session.php';
include_once 'classes/product.php';
include_once 'classes/categories.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();


$product = new product();
$result = $product->getProductbyId($_GET['id']);
if (!$result) {
    echo 'Không tìm thấy sản phẩm!';
    die();
}

$category = new categories();
$categoryOfProduct = $category->getById($result['cateId']);
$list = $product->getProductsByCateId(1,$categoryOfProduct['id'],4);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detail.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="./file/css/fontawesome.min.css">
    <link rel="stylesheet" href="js/fontawesome.min.js">
    <link rel="stylesheet" href="css/css2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,600;0,800;1,200;1,400;1,600;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <script src="./file/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title><?= $result['name'] ?></title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container" style="padding-top: 70px; font-size: 62.5%;">
        <div class="c1">
            <i class="ti-angle-right"></i>
        </div>
            
        <div class="c2">
            <p>Điện thoại <?= $categoryOfProduct['name'] ?></p>
        </div>
           
    </div>
        
        
    <div class="container">
        <div class="grid">
          <div class="grid__row">
            <div class="grid__column-2">  
                <div id="demo" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner-1">
                        <div class="carousel-item active">
                            <img src="admin/uploads/<?= $result['image'] ?>" alt="Los Angeles" class="d-block w-100">
                        </div>
                    </div>
                </div>
                <div class="c4"></div>
            </div>  
            <div class="grid__column-10">
                <div class="tabbar">
                    <p style="font-weight: bold;font-size: 40px;"><?= $result['name'] ?></p>
                </div>
                <div class="home-filter">
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                </div>

                <div class="c5">
                  <h1><?= number_format($result['promotionPrice'], 0, '', ',')?>VNĐ</h1>
                </div>
                <br><br>
                <div class="c8">
                    <div class="giohang">
                        <a href="add_cart.php?id=<?= $value['id'] ?>">
                            <button>
                                <i class="ti-shopping-cart"></i> Thêm vài giỏ hàng
                            </button>
                        </a>
                    </div>
                </div>
              </div>
          </div>
        </div>  
    </div>

    <div class="container">
        <div class="a2">CHI TIẾT SẢN PHẨM</div>
            <div class="a3">
                <div class="a3-1">
                    Danh Mục
                </div>
                <div class="a3-2">
                    <i class="ti-angle-right"></i>
                    <a href="#">Điện thoại <?= $categoryOfProduct['name']?></a>
                </div>
            </div>        
            <div class="a3">
                <div class="a3-1">Thương Hiệu</div>
                <div class="a3-2">
                    <p><?= $categoryOfProduct['name']?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="a2">MÔ TẢ SẢN PHẨM</div>
            <div class="c11">
                <span style="font-weight:bold;font-size: 20px;">
                    <?= $result['des'] ?>
                </span>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <p style="font-size:20px ; text-transform: uppercase; font-weight: bold;">các sản phẩm tương tự</p>
        <div class="spnb d-none d-sm-block">
            <div class="row">
                <?php foreach ($list as $key => $value) { ?>
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
    </style>
    <?php include 'footer.php'; ?>
</body>

</html>