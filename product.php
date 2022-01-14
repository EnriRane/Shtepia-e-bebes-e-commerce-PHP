<?php
 require ('top.php');
  if(isset($_GET['id'])){
    $product_id=get_safe_value($con,$_GET['id']);
    if($product_id>0){
        $get_product=get_product($con,'','',$product_id);
    }else{
        ?>
        <script>
        window.location.href='index.php';
        </script>
        <?php
    }
    $resMultipleImages=mysqli_query($con,"select product_images from product_images where product_id='$product_id'");
    $multipleImages=[];
    if(mysqli_num_rows($resMultipleImages)>0){
        while($rowMultipleImages=mysqli_fetch_assoc($resMultipleImages)){
            $multipleImages[]=$rowMultipleImages['product_images'];
        }
    }
}else{
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}

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
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Qirinj festash</a></h2>
                                <span class="quantity">Sasia: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
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
                                  <a class="breadcrumb-item" href="index.php">Faqja kryesore</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="categories.php?id=<?php echo $get_product['0']['categories_id'] ?>"><?php echo $get_product['0']['categories'] ?></a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $get_product['0']['name'] ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active imageZoom" id="img-tab-1">
                                            <img data-origin="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'] ?>" alt="full-image" >
                                        </div>
                                        <?php if(isset($multipleImages[0])){?>
                                        <div id="multiple_images">
                                            <?php
                                            foreach($multipleImages as $list){
                                            echo "<img src='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."' onclick=showMultipleImage('".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."') >";
                                            }
                                            ?>
                                            
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $get_product['0']['name'] ?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize"><del><?php echo $get_product['0']['mrp'] ?></del></li>
                                    <li><?php echo $get_product['0']['price'] ?>leke</li>
                                </ul>
                                <p class="pro__info"><?php echo $get_product['0']['short_desc'] ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <?php
                                        $productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
                                        
                                        $pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
                                        
                                        $cart_show='yes';
                                        if($get_product['0']['qty']>$productSoldQtyByProductId){
                                            $stock='In Stock';          
                                        }else{
                                            $stock='In Stock';
                                            $cart_show='';
                                        }
                                        ?>
                                        <p><span>Gjendja:</span> <?php echo $stock?></p>
                                    </div>
                                     <div class="sin__desc">
                                        <?php
                                        if($cart_show!=''){
                                        ?>
                                        <p><span>Sasia qe dua te blej:</span> 
                                        <select id="qty">
                                            <?php
                                            for($i=1;$i<=$pending_qty;$i++){
                                                echo "<option>$i</option>";
                                            }
                                            ?>
                                        </select>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Kategoria:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_product['0']['categories'] ?></a></li>
                                        </ul>
                                    </div>
                                    
                                    </div>
                                </div>
                                <?php
                                if($cart_show!=''){
                                ?>
                                <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product[0]['id'] ?>','add')">Shto ne karte</a>
                                <a class="fr__btn buy_now" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add','yes')">Bli Tani</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php echo $get_product['0']['description'] ?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        
        <!-- End Banner Area -->       
        <script>
            function showMultipleImage(im){
                jQuery('#img-tab-1').html("<img src='"+im+"' data-origin='"+im+"'/>");
                jQuery('.imageZoom').imgZoom();
            }
            </script>
       
<?php require ('footer.php'); ?>