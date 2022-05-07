<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="header_list text-md-left text-center">
                        <li><a href="tel:+ 00 123 456 789"><i class="fa fa-phone"></i>+ 00 123 456 789</a></li>
                        <li><a href="mailto:info@gmail.com"><i class="fa fa-envelope-o"></i>info@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="header_list text-md-right text-center">
                        <li><a href="#test-popup1" class="open-popup-link">Login</a>
                            <div id="test-popup1" class="white-popup lr-popup mfp-hide text-center">
                                <h4>Login</h4>
                                <form class="subscribe-popup-form" method="post" action="#">
                                    <input name="email" required type="email" placeholder="Enter Your Email">
                                    <input name="password" required type="password" placeholder="Enter Your Password">
                                    <div class="form-check text-left">
                                        <label>Remember me
                                            <input class="defult-check" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <a href="#" class="forgot-password float-right">Forgot Password ?</a>
                                    </div>
                                    <button class="btn btn-primary" title="Login" type="button">Login</button>
                                </form>
                                <h6>Don't have an account?</h6>
                                <a href="#test-popup2" class="sign-up open-popup-link">Click here to Sign up</a>
                            </div>  
                            <div id="test-popup2" class="white-popup lr-popup mfp-hide">
                                <h4>Registration</h4>
                                <form class="subscribe-popup-form" method="post" action="#">
                                    <input name="input" required type="input" placeholder="Enter Your name">
                                    <input name="email" required type="email" placeholder="Enter Your Email">
                                    <input name="password" required type="password" placeholder="Enter Your Password">
                                    <input name="password" required type="password" placeholder="Confirmation Password">
                                    <div class="form-check">
                                        <label>I accept the terms and conditions
                                            <input class="defult-check" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <button class="btn btn-primary" title="Subscribe" type="button">Register</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mdl">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hm-inner d-sm-flex align-items-center justify-content-between">
                        <div class="header-logo">
                            <a href="index.php"><img src="image/logo.png" alt="logo"></a>
                        </div>
                        <form class="header-form">
                            <input class="search-box" placeholder="Search Product..."  required value="" type="search">
                            <button type="submit">Search</button>
                        </form>
                        <div class="header-right">
                            <div class="header-cart">
                                <?php
                                if(isset($_SESSION["cart_item"])){
                                    $total_quantity = 0;
                                    $total_price = 0;
                                    foreach ($_SESSION["cart_item"] as $item){
                                        $item_price = $item["SoLuong"]*$item["GiaTien"];
                                        $total_quantity += $item["SoLuong"];
                                        $total_price += ($item_price);
                                    }
                                } else {
                                    $total_quantity = 0;
                                    $total_price = 0;
                                }
                                ?>	
                                <a href="cart.php">
                                    <div class="cart-icon">
                                        <img src="image/cart-icon.png" alt="cart-icon">
                                        <span id="tongSoLuongSPGioHang"><?php echo (isset($_SESSION["cart_item"]) ? $total_quantity :"0" )?></span>
                                    </div>
                                    <span id="tongTienGioHang"><?php echo (isset($_SESSION["cart_item"]) ? number_format($total_price,0,".",".")."₫"  : "0₫")?></span><i class="fa fa-angle-down"></i> 
                                </a>
                                <div class="cart-box" id="cartBox">
                                    <div class="cart-info">
                                        <?php
                                            if(isset($_SESSION["cart_item"])){
                                                foreach ($_SESSION["cart_item"] as $item){
                                                    $item_price = $item["SoLuong"] * $item["GiaTien"];
                                                    echo "<div class='cart-prodect d-flex justify-content-between'>".
                                                            "<div class='cart-img'>".
                                                                "<img src='./img/sanpham/".$item["Hinh"]."' alt='cart-img'>".
                                                            "</div>".
                                                            "<div class='cart-product'>".
                                                                "<a href='product-detail.php?id=".$item["MaSP"]."'>".$item["TenSP"]."</a>".
                                                                "<p style='color: black; font-size: 13px'>Số lượng: ".$item["SoLuong"]."</p>".
                                                                "<p>".number_format($item_price,0,".",".")."₫</p>".
                                                            "</div>".
                                                            "<a href='#' onclick='removeFromCart(".$item["MaSP"].")' class='close-icon d-flex align-items-center'><i class='ion-close'></i></a>".
                                                        "</div>";
                                                }
                                                echo "</div>".
                                                    "<div class='price-prodect d-flex align-items-center justify-content-between'>".
                                                        "<p class='total'>Tổng cộng</p>".
                                                        "<p class='total-price'>".number_format($total_price,0,".",".")."₫</p>". 
                                                    "</div>".
                                                    "<div class='cart-btn'>".
                                                        "<a href='cart.php' class='btn btn-primary'>Xem giỏ hàng</a>".
                                                    "</div>";
                                            } else {
                                                echo "<div class='cart-prodect d-flex'>".
                                                        "<p>Giỏ hàng của bạn chưa có sản phẩm nào</p>".
                                                    "</div>".
                                                "</div>";
                                            }
                                        ?>	
                                    </div>
                                </div>
                            </div>
                            <div class="d-lg-none mm_icon">
                                <div class="form-captions" id="search">
                                    <button type="submit" class="submit-btn-2"><i class="fa fa-search"></i></button>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-btm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="header-logo">
                            <a href="#"><img src="image/logo.png" alt="logo"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                    <div class="sub-menu dropdown-menu">
                                        <ul class="all-menu">
                                            <li><a href="index.php">Home Page 1</a></li>
                                            <li><a href="index-2.html">Home Page 2</a></li>
                                            <li><a href="index-3.html">Home Page 3</a></li>
                                            <li><a href="index-4.html">Home Page 4</a></li>
                                            <li><a href="index-5.html">Home Page 5</a></li>
                                            <li><a href="index-6.html">Home Page 6</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about-us.html">About us</a>
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                    <div class="sub-menu dropdown-menu">
                                        <ul class="all-menu">
                                            <li><a href="error-404.html">404 Page</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="active">
                                    <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                    <div class="sub-menu mega-menu dropdown-menu">
                                        <ul class="d-lg-flex">
                                            <li class="submenu-links dropdown col-lg-3">
                                                <a href="#" class="menu-title dropdown-toggler" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Pages<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                                <ul class="all-menu dropdown-menu">
                                                    <li><a href="shop-list.html">Shop List View</a></li>
                                                    <li><a href="shop-grid.html">Shop Grid View</a></li>
                                                    <li><a href="shop-three-columns.html">shop 3 Column</a></li>
                                                    <li><a href="shop-four-columns.html">shop 4 Column</a></li>
                                                    <li><a href="shop-left-sidebar.html">shop Left Sidebar</a></li>
                                                    <li><a href="shop-right-sidebar.html">shop Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu-links dropdown col-lg-3">
                                                <a href="#" class="menu-title dropdown-toggler" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product Detail<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                                <ul class="all-menu dropdown-menu">
                                                    <li class="active"><a href="product-detail.html">Product Default</a></li>
                                                    <li><a href="product-detail-left-sidebar.html">Product Left Sidebar</a></li>
                                                    <li><a href="product-detail-right-sidebar.html">Product Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu-links dropdown col-lg-3">
                                                <a href="#" class="menu-title dropdown-toggler" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Extra<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                                <ul class="all-menu dropdown-menu">
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="my-account.html">My Account</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu-img col-lg-3"><a href="#"><img src="image/header-banner.jpg" alt="banner"></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                    <div class="sub-menu dropdown-menu">
                                        <ul class="all-menu">
                                            <li><a class="dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog Layout<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                                <div class="sub-menu dropdown-menu">
                                                    <ul class="all-menu">
                                                        <li><a href="blog-standard-fullwidth.html">Blog Standard Fullwidth</a></li> 
                                                        <li><a href="blog-standard-left-sidebar.html">Blog Standard Left Sidebar</a></li> 
                                                        <li><a href="blog-standard-right-sidebar.html">Blog Standard Right Sidebar</a></li> 
                                                        <li><a href="blog-three-columns.html">Blog 3 Columns </a></li>
                                                        <li><a href="blog-four-columns.html">Blog 4 Columns</a></li>
                                                        <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li> 
                                                        <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li> 
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a class="dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog Masonry<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                                <div class="sub-menu dropdown-menu">
                                                    <ul class="all-menu">
                                                        <li><a href="blog-masonry-three-columns.html">Masonry 3 Columns</a></li> 
                                                        <li><a href="blog-masonry-four-columns.html">Masonry 4 Columns</a></li> 
                                                        <li><a href="blog-masonry-left-sidebar.html">Masonry Left Sidebar </a></li>
                                                        <li><a href="blog-masonry-right-sidebar.html">Masonry Right Sidebar</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a class="dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog List<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                                <div class="sub-menu dropdown-menu">
                                                    <ul class="all-menu">
                                                        <li><a href="blog-list-left-sidebar.html">List Left Sidebar </a></li>
                                                        <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a class="dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog Single<i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></a>
                                                <div class="sub-menu dropdown-menu">
                                                    <ul class="all-menu">
                                                        <li><a href="blog-detail.html">Default</a></li>
                                                        <li><a href="blog-detail-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="blog-detail-right-sidebar.html">Right Sidebar</a></li>
                                                        <li><a href="blog-detail-slider.html">Slider Post</a></li>
                                                        <li><a href="blog-detail-video.html">Video post</a></li>
                                                        <li><a href="blog-detail-audio.html">Audio Post</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>