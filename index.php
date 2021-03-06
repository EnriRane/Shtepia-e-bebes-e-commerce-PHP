<?php require ('top.php');
$resBanner=mysqli_query($con,"select * from banner where status='1' order by order_no asc");
 ?>


        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <?php if(mysqli_num_rows($resBanner)>0){?> 
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <?php while($rowBanner=mysqli_fetch_assoc($resBanner)){?>
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height" style="background-image: url('<?php echo BANNER_SITE_PATH.$rowBanner['image']?>'); background-size: cover;">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2><?php echo $rowBanner['heading1']?></h2>
                                        <h1><?php echo $rowBanner['heading2']?></h1>
                                        <?php
                                        if($rowBanner['btn_txt'] !='' && $rowBanner['btn_link']!=''){
                                            ?>
                                            <div class="cr__btn">
                                                <a href="<?php echo $rowBanner['btn_link']?>"><?php echo $rowBanner['btn_txt']?></a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Ardhjet e reja</h2>
                            <p>Ne rreshtin me poshte do te shfaqen prurjet me te reja te "Shtepia e Bebes"</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php
                                $get_product=get_product($con,4);
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
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Me te shiturat</h2>
                            <p>Me poshte do te gjeni produktet me te shitura te "Shtepia e bebes"</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <?php
                            $get_product=get_product($con,4,'','','','','yes');
                            foreach($get_product as $list){
                        ?>
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product.php?id=<?php echo $list['id']?>">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" height="385" width="290">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                                        <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><del><?php echo $list['mrp']?></del></li>
                                            <li><?php echo $list['price']?>leke</li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
       <input type="hidden" id="qty" value="1"/>
<?php require ('footer.php'); ?>