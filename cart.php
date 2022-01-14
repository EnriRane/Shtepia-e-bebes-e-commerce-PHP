<?php 
require('top.php');
?>
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Kerko ketu... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">Sasia: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Fshije kete produkt"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Qirinj per festa</a></h2>
                                <span class="quantity">Sasia: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Fshije kete produkt"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Nentotali:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.php">Shiko karten</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Ceko</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/komplet.png) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Menuja kryesore</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Karta e pazarit</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Produkti</th>
                                            <th class="product-name">Emri i produktit</th>
                                            <th class="product-price">Cmimi</th>
                                            <th class="product-quantity">Sasia</th>
                                            <th class="product-subtotal">Totali</th>
                                            <th class="product-remove">Fshije</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_SESSION['cart'])){
                                            foreach($_SESSION['cart'] as $key=>$val){
                                            $productArr=get_product($con,'','',$key);
                                            $pname=$productArr[0]['name'];
                                            $mrp=$productArr[0]['mrp'];
                                            $price=$productArr[0]['price'];
                                            $image=$productArr[0]['image'];
                                            $qty=$val['qty'];
                                            ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $pname?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><del><?php echo $mrp?></del></li>
                                                    <li><?php echo $price?>leke</li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $price?>leke</span></td>
                                                <td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
                                                <br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">perditeso</a>
                                                </td>
                                                <td class="product-subtotal"><?php echo $qty*$price ?>leke</td>
                                                <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php SITE_PATH ?>index.php">Vazhdo pazarin</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <!-- <a href="#">update</a> -->
                                            <a href="<?php SITE_PATH ?>checkout.php">Bli</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->

        
                                        
<?php require('footer.php')?>        