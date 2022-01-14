
<?php 
require('top.php');
if (!isset($_SESSION['cart']) || count($_SESSION['cart'])==0) {
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
 $cart_total=0;
 $errMsg="";
if (isset($_POST['submit'])) {
    $address=get_safe_value($con,$_POST['address']);
    $city=get_safe_value($con,$_POST['city']);
    $pincode=get_safe_value($con,$_POST['pincode']);
    $payment_type=get_safe_value($con,$_POST['payment_type']);
    $user_id=$_SESSION['USER_ID'];
    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['price'];
        $qty=$val['qty'];
        $cart_total=$cart_total+($price*$qty);
    }
    $total_price=$cart_total;
    $payment_status='pending';
    if($payment_type=='Leke ne Dore'){
    $payment_status='success';
    }
    $order_status='1';
    $added_on=date('Y-m-d h:i:s');
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

    if(isset($_SESSION['COUPON_ID'])){
        $coupon_id=$_SESSION['COUPON_ID'];
        $coupon_code=$_SESSION['COUPON_CODE'];
        $coupon_value=$_SESSION['COUPON_VALUE'];
        $total_price=$total_price-$coupon_value;
        unset($_SESSION['COUPON_ID']);
        unset($_SESSION['COUPON_CODE']);
        unset($_SESSION['COUPON_VALUE']);
    }else{
        $coupon_id='';
        $coupon_code='';
        $coupon_value='';   
    }
    mysqli_query($con,"insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid,coupon_id,coupon_code,coupon_value) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid','$coupon_id','$coupon_code','$coupon_value')");


    $order_id=mysqli_insert_id($con);

    foreach($_SESSION['cart'] as $key=>$val){
        $productArr=get_product($con,'','',$key);
        $price=$productArr[0]['price'];
        $qty=$val['qty'];
        
        mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
    }
   // unset($_SESSION['cart']);
    if($payment_type=='Pagese online'){

        
        
        $userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:your api key",
                  "X-Auth-Token:your tokan"));
        $payload = Array(
    'purpose' => 'Buy Product',
    'amount' => $total_price,
    'phone' => $userArr['mobile'],
    'buyer_name' => $userArr['name'],
    'redirect_url' => 'http://localhost/FINAL_PROJECT/payment_complete.php',
    'send_email' => false,
    'send_sms' => false,
    'email' => $userArr['email'],
    'allow_repeated_payments' => false
);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        $response=json_decode($response);

        if (isset($response->payment_request->id)) {
            
           // unset($_SESSION['cart']);
            $_SESSION['TID']=$response->payment_request->id;
            mysqli_query($con,"update `order` set txnid='".$response->payment_request->id."' where id='".$order_id."'");
            ?>
            <script>
                window.location.href='<?php echo $response->payment_request->longurl ?>';
            </script>

            <?php
            
        }else{
            if (isset($response->message)) {
                $errMsg.="<div class='instamojo_error'>";
                if(is_array($response->message)){
                foreach ($response->message as $key => $val) {
                    $errMsg.=strtoupper($key).':'.$val[0].'<br>';
                }
            }
            else{
                $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

                if(!$pageWasRefreshed ) {
                    echo '<script>alert("Porosia juaj perfundoi me sukses! Ju lutem prisni kontaktin tone!")</script>';
                } else {
                   //do nothing;
                }
                
            }
                $errMsg.="</div>";
            }else{

               
            }
        }
        
            
    }else{  
        sentInvoice($con,$order_id);

?>
    <script>
        window.location.href='thank_you.php';
    </script>
    <?php
    
    }    
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
                                <span class="quantity">QTY: 1</span>
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
                                <h2><a href="product-details.html">Brone Candle</a></h2>
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
                                  <span class="breadcrumb-item active">ceko</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php echo $errMsg ?>
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <?php 
                                    $accordion_class='accordion__title';
                                    if(!isset($_SESSION['USER_LOGIN'])){
                                    $accordion_class='accordion__hide';
                                    ?>
                                    <div class="accordion__title">
                                        Metoda e cekimit
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form id="login-form" method="post">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="login_email" id="login_email" placeholder="Emaili*" style="width:100%">
                                                                <span class="field_error" id="login_email_error" style="color: red;"></span>
                                                            </div>
                                                            
                                                            <div class="single-input">
                                                                <input type="password" name="login_password" id="login_password" placeholder="Passwordi*" style="width:100%">
                                                                <span class="field_error" id="login_password_error" style="color: red;"></span>
                                                            </div>
                                                            
                                                            <p class="require">* Fusha qe duhen plotesuar</p>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                            </div>
                                                            <div class="form-output login_msg">
                                                                <p class="form-messege field_error"></p>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Rregjistrohu</h5>
                                                            <div class="single-input">
                                                                <input type="text" name="name" id="name" placeholder="Emri*" style="width:100%">
                                                                <span class="field_error" id="name_error" style="color: red;"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <input type="text" name="email" id="email" placeholder="Emaili*" style="width:100%">
                                                                <span class="field_error" id="email_error" style="color: red;"></span>
                                                            </div>
                                                            
                                                            <div class="single-input">
                                                                <input type="text" name="mobile" id="mobile" placeholder="Numri i celuarit*" style="width:100%">
                                                                <span class="field_error" id="mobile_error" style="color: red;"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <input type="password" name="password" id="password" placeholder="Passwordi*" style="width:100%">
                                                                <span class="field_error" id="password_error" style="color: red;"></span>
                                                            </div>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_register()">Rregjistrohu</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                     <div class="<?php echo $accordion_class?>">
                                        Informacion mbi adresen
                                    </div>
                                    <form method="post">
                                       
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                           
                                                <div class="row">
                                                   
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address" placeholder="Adresa e banimit" required="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="Qyteti/Shteti" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pincode" placeholder="Numri i telefonit" required="">
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                           
                                        </div>
                                    </div>
                                    <div class="<?php echo $accordion_class?>">
                                        Informacion mbi pagesen
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                Pagesa Cash gjate dorezimit te produktit <input type="radio" name="payment_type" value="Leke ne Dore" required/>
                                                   <!-- &nbsp;&nbsp;Pagesa online<input type="radio" name="payment_type" value="Pagese online" required/>
                                    -->
                                                </div>
                                            <div class="single-method">
                                                
                                            </div>

                                        </div>
                                    </div>
                                    <div class="dark-btn">
                                        <button type="submit" name="submit" class="fv-btn" >Porosit</button>
                                     </div>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Porosia juaj</h5>
                            <div class="order-details__item">
                                         <?php
                                            $cart_total=0;
                                            foreach($_SESSION['cart'] as $key=>$val){
                                            $productArr=get_product($con,'','',$key);
                                            $pname=$productArr[0]['name'];
                                            $mrp=$productArr[0]['mrp'];
                                            $price=$productArr[0]['price'];
                                            $image=$productArr[0]['image'];
                                            $qty=$val['qty'];
                                            $cart_total=$cart_total+($price*$qty);
                                         ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname ?></a>
                                        <span class="price"><?php echo $price*$qty ?>leke</span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="ordre-details__total" id="coupon_box">
                                <h5>Vlera e kuponit</h5>
                                <span class="price" id="coupon_price"></span>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Porosia totale</h5>
                                <span class="price" id="order_total_price"><?php echo $cart_total ?>leke </span>
                            </div>
                            <div class="ordre-details__total bilinfo">
                                <input type="textbox" id="coupon_str" class="coupon_style mr5"/>
                                <input type="button" name="submit" class="fv-btn coupon_style" value="Apliko per kuponin" onclick="set_coupon()"/>
                                
                            </div>
                            <div id="coupon_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->        
        <script>
            function set_coupon(){
                var coupon_str=jQuery('#coupon_str').val();
                if(coupon_str!=''){
                    jQuery('#coupon_result').html('');
                    jQuery.ajax({
                        url:'set_coupon.php',
                        type:'post',
                        data:'coupon_str='+coupon_str,
                        success:function(result){
                            var data=jQuery.parseJSON(result);
                            if(data.is_error=='yes'){
                                jQuery('#coupon_box').hide();
                                jQuery('#coupon_result').html(data.dd);
                                jQuery('#order_total_price').html(data.result);
                            }
                            if(data.is_error=='no'){
                                jQuery('#coupon_box').show();
                                jQuery('#coupon_price').html(data.dd);
                                jQuery('#order_total_price').html(data.result);
                            }
                        }
                    });
                }
            }
        </script> 
                                        
<?php 
if(isset($_SESSION['COUPON_ID'])){
    unset($_SESSION['COUPON_ID']);
    unset($_SESSION['COUPON_CODE']);
    unset($_SESSION['COUPON_VALUE']);
}
require('footer.php');
?>        
