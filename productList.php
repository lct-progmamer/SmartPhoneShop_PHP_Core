<?php
include_once 'lib/session.php';
include_once 'classes/product.php';
include_once 'classes/categories.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();

$product = new product();
$list = $product->getProductsByCateId((isset($_GET['page']) ? $_GET['page'] : 1), (isset($_GET['cateId']) ? $_GET['cateId'] : 2),8);
$pageCount = $product->getCountPagingClient((isset($_GET['cateId']) ? $_GET['cateId'] : 2));

$categories = new categories();
$categoriesList = $categories->getAll();
$category = $categories->getById($_GET['cateId']);
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
	<style type="text/css">
		.featuredProducts{
			text-align: center;
			background-color: #D70018;
			color: white;
			padding : 5px 0px;
			font-size: 14px;
			text-transform: uppercase;
		}
		.category{
			margin-top: 10px;
			margin-left: 100px;
			width: 200px;

		}
		.category span{
			font-size: 20px;
		}
		.category select{
			height: 30px;
	    	width: 100px;
	    	font-size: 16px
		}

	</style>
</head>

<body>
	<?php include 'header.php'; ?>
	<div style="height: 100px;"></div>
	<div class="featuredProducts">
		<h1>Danh sách sản phẩm</h1>
	</div>
	<div class="category">
		<span>Danh mục: </span><select onchange="location = this.value;">
			<?php
			foreach ($categoriesList as $key => $value) {
				if ($value['id'] == $_GET['cateId']) { ?>
					<option selected value="productList.php?cateId=<?= $value['id'] ?>"><?= $value['name'] ?></option>
				<?php } else { ?>
					<option value="productList.php?cateId=<?= $value['id'] ?>"><?= $value['name'] ?></option>
				<?php } ?>
			<?php }
			?>
		</select>
	</div>
	<br><br>
	<div class="container">
		<p style="font-size:20px ; text-transform: uppercase; font-weight: bold;">
			Danh Sách Điện Thoại <?=$category['name']?>
		</p>
		<div class="spnb d-none d-sm-block">
			<div class="row">
				<?php foreach ($list as $key => $value) { ?>
					<div class="col-lg-3" style="margin-top:20px">
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