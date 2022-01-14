<?php
require ('top.php');
if(!isset($_GET['id']) && $_GET['id']!=''){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}

$cat_id=get_safe_value($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
    $sub_categories=get_safe_value($con,$_GET['sub_categories']);
}
$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
    $sort=get_safe_value($con,$_GET['sort']);
    if($sort=="price_high"){
        $sort_order=" order by product.price desc ";
        $price_high_selected="selected";    
    }if($sort=="price_low"){
        $sort_order=" order by product.price asc ";
        $price_low_selected="selected";
    }if($sort=="new"){
        $sort_order=" order by product.id desc ";
        $new_selected="selected";
    }if($sort=="old"){
        $sort_order=" order by product.id asc ";
        $old_selected="selected";
    }

}

if($cat_id>0){
    $get_product=get_product($con,'',$cat_id,'','',$sort_order,'',$sub_categories);
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
                                <h2><a href="product-details.html">Kufje dhe mikorofon</a></h2>
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
                                <h2><a href="product-details.html">Qiri per festa</a></h2>
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
                                  <a class="breadcrumb-item" href="index.php">Faqja kryesore</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Produktet</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <?php if(count($get_product)>0){ ?>
                    <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select" onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')" id="sort_product_id">
                                        <option value="">Renditje e cfardoshme</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Renditje sipas cmimit nga me e lira te me e shtrenjta</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Renditje sipas cmimit nga me e shtrenjta te me e lira</option>
                                        <option value="new" <?php echo $new_selected?>>Rendit rrobat me te reja</option>
                                        <option value="old" <?php echo $old_selected?>>Rendit rrobat me te vjetra </option>
                                    </select>
                                </div>
                                
                               
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                         <?php
                                
                                foreach ($get_product as $list) {
                                    
                            ?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id'] ?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="product images" height="385" width="290">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php"><?php echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><del><?php echo $list['mrp'] ?></del></li>
                                            <li><?php echo $list['price'] ?>leke</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <?php } ?>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    <?php } else{
                        echo "Data Not Found";
                    }?>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <input type="hidden" id="qty" value="1"/>
       
<?php require ('footer.php'); ?>