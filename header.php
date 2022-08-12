<?php
    include_once 'lib/session.php';
    include_once 'classes/cart.php';
    include_once 'classes/product.php';
    $cart = new cart();
    $totalQty = $cart->getTotalQtyByUserId();

?>


<div class="head">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-sm-block" style="color: #ffffff;">
                <i id="logo" class="fa fa-mobile fa-2x " aria-hidden="true">
                    <a href="index.php" style="font-family: Fira Sans;">
                        SmartPhone 8 Win
                    </a>
                </i>
            </div>


            <div class="col-lg-3 d-none d-sm-block">
                <!-- <form action="header.php" method="post">
                    <input type="text" placeholder="   tìm kiếm.." name="search" value="<?php echo $_POST['search'] ?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form> -->
            </div>


            <div id="c6" class="col-lg-6 col-xs-12">
                <a href="#">
                    <div id="but">
                        <i class="fa fa-phone fa-2x"></i>
                        <p style="font-size: 12px; margin: 0px;">Gọi mua hàng
                            <br>
                            <strong style="color: #ffff;">0987654321</strong>
                        </p>

                    </div>
                </a>
                <a href="order.php">
                    <div id="but">
                        <i class="fa fa-truck fa-2x"></i>
                        <p>Tra cứu <br> đơn hàng</p>
                    </div>
                </a>
                <a href="#">
                    <div id="but">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <p>Cửa hàng <br> gần bạn</p>
                    </div>
                </a>
                <a href="checkout.php">
                    <div id="but">
                        <i class="fa fa-shopping-cart fa-2x"></i>
                        <p>Giỏ <br> hàng</p>
                    </div>
                </a>


                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                    <a href="logout.php">
                        <div id="but">
                            <i class="fa fa-user-circle fa-2x"></i>
                            <p>Đăng <br> xuất</p>
                        </div>
                    </a>
                <?php } else { ?>
                    <a href="login.php">
                        <div id="but">
                            <i class="fa fa-user-circle fa-2x"></i>
                            <p>Đăng <br> nhập</p>
                        </div>
                    </a>
                    <a href="register.php">
                        <div id="but">
                            <i class="fa fa-user-circle fa-2x"></i>
                            <p>Đăng <br> ký</p>
                        </div>
                    </a>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>