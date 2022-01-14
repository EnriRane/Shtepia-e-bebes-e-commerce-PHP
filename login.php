<?php
 require ('top.php');
 if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes') {
     ?>
     <script type="">
         window.location.href='my_order.php';
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
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.php">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
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
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Login</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="login-form" action="#" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" id="login_email" name="login_email" placeholder="Emaili*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="login_email_error" style="color: red;"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" id="login_password" name="login_password" placeholder="Passwordi*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="login_password_error" style="color: red;"></span>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                        <a href="forgot_password.php" class="forgot_password">Harrove passwordin</a>
                                    </div>
                                </form>
                                <div class="form-output login_msg">
                                    <p class="form-messege field_error"></p>
                                </div>
                            </div>
                        </div> 
                
                </div>
                

                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Rregjistrohu</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="register-form" action="#" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="name" id="name" placeholder="Emri*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="name_error" style="color: red;"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="email" id="email" placeholder="Emaili*" style="width:45%">

                                            <button type="button" class="fv-btn email_sent_otp height_60px" onclick="email_sent_otp()">Dergo OTP</button>

                                            <input type="text" id="email_otp" placeholder="OTP" style="width:45%" class="email_verify_otp">

                                            <button type="button" class="fv-btn email_verify_otp height_60px" onclick="email_verify_otp()">Verifiko OTP</button>
                                            <span id="email_otp_result"></span>
                                        </div>
                                        <span class="field_error" id="email_error" style="color: red;"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="mobile" id="mobile" placeholder="Numri yt i celularit*" style="width:100%">
                                            <button type="button" class="fv-btn mobile_sent_otp height_60px" onclick="mobile_sent_otp()">Dergo OTP</button>
                                            
                                            <input type="text" id="mobile_otp" placeholder="OTP" style="width:45%" class="mobile_verify_otp">
                                            
                                            
                                            <button type="button" class="fv-btn mobile_verify_otp height_60px" onclick="mobile_verify_otp()">Veriko OTP</button>
                                            
                                            <span id="mobile_otp_result"></span>
                                        </div>
                                        <span class="field_error" id="mobile_error" style="color: red;"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="password" id="password" placeholder="Passwordi*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="password_error" style="color: red;"></span>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="button" onclick="user_register()" class="fv-btn" disabled id="btn_register">Rregjistrohu</button>
                                    </div>
                                </form>
                                <div class="form-output register_msg">
                                    <p class="form-messege field_error"></p>
                                </div>
                            </div>
                        </div> 
                
                </div>
                    
            </div>
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
        <input type="hidden" id="is_email_verified"/>
        <input type="hidden" id="is_mobile_verified"/>
        <script>
        function email_sent_otp(){
            jQuery('#email_error').html('');
            var email=jQuery('#email').val();
            if(email==''){
                jQuery('#email_error').html('Ju lutem vendosni emailin tuaj...');
            }else{
                jQuery('.email_sent_otp').html('Ju lutem prisni..');
                jQuery('.email_sent_otp').attr('disabled',true);
                jQuery.ajax({
                    url:'send_otp.php',
                    type:'post',
                    data:'email='+email+'&type=email',
                    success:function(result){
                        if(result=='done'){
                            jQuery('#email').attr('disabled',true);
                            jQuery('.email_verify_otp').show();
                            jQuery('.email_sent_otp').hide();
                            
                        }else if(result=='email_present'){
                            jQuery('.email_sent_otp').html('Dergo OTP');
                            jQuery('.email_sent_otp').attr('disabled',false);
                            jQuery('#email_error').html('Ky email tashme ekziston...');
                        }else{
                            jQuery('.email_sent_otp').html('DergoOTP');
                            jQuery('.email_sent_otp').attr('disabled',false);
                            jQuery('#email_error').html('Ju lutem provoni perseri pas disa castesh...');
                        }
                    }
                });
            }
        }
        function email_verify_otp(){
            jQuery('#email_error').html('');
            var email_otp=jQuery('#email_otp').val();
            if(email_otp==''){
                jQuery('#email_error').html('Ju lutem vendosni OTP');
            }else{
                jQuery.ajax({
                    url:'check_otp.php',
                    type:'post',
                    data:'otp='+email_otp+'&type=email',
                    success:function(result){
                        if(result=='done'){
                            jQuery('.email_verify_otp').hide();
                            jQuery('#email_otp_result').html('Adresa e emailitu verifikua');
                            jQuery('#is_email_verified').val('1');
                            if(jQuery('#is_mobile_verified').val()==1){
                                jQuery('#btn_register').attr('disabled',false);
                            }
                        }else{
                            jQuery('#email_error').html('Ju lutem vendosni nje OTP te vlefshme');
                        }
                    }
                    
                });
            }
        }
        
        function mobile_sent_otp(){
            jQuery('#mobile_error').html('');
            var mobile=jQuery('#mobile').val();
            if(mobile==''){
                jQuery('#mobile_error').html('Ju lutem vendsni numrin e celularit');
            }else{
                jQuery('.mobile_sent_otp').html('Ju lutem prisni..');
                jQuery('.mobile_sent_otp').attr('disabled',true);
                jQuery('.mobile_sent_otp');
                jQuery.ajax({
                    url:'send_otp.php',
                    type:'post',
                    data:'mobile='+mobile+'&type=mobile',
                    success:function(result){
                        if(result=='done'){
                            jQuery('#mobile').attr('disabled',true);
                            jQuery('.mobile_verify_otp').show();
                            jQuery('.mobile_sent_otp').hide();
                        }else if(result=='mobile_present'){
                            jQuery('.mobile_sent_otp').html('Dergo OTP');
                            jQuery('.mobile_sent_otp').attr('disabled',false);
                            jQuery('#mobile_error').html('Ky numer telefoni eshte tashme ekzistues');
                        }else{
                            jQuery('.mobile_sent_otp').html('Dergo OTP');
                            jQuery('.mobile_sent_otp').attr('disabled',false);
                            jQuery('#mobile_error').html('Ju lutem provoni perseri pas disa castesh');
                        }
                    }
                });
            }
        }
        function mobile_verify_otp(){
            jQuery('#mobile_error').html('');
            var mobile_otp=jQuery('#mobile_otp').val();
            if(mobile_otp==''){
                jQuery('#mobile_error').html('Ju lutem vendosni OTP');
            }else{
                jQuery.ajax({
                    url:'check_otp.php',
                    type:'post',
                    data:'otp='+mobile_otp+'&type=mobile',
                    success:function(result){
                        if(result=='done'){
                            jQuery('.mobile_verify_otp').hide();
                            jQuery('#mobile_otp_result').html('Numri i celularit eshte tashme ekzitues');
                            jQuery('#is_mobile_verified').val('1');
                            if(jQuery('#is_email_verified').val()==1){
                                jQuery('#btn_register').attr('disabled',false);
                            }
                        }else{
                            jQuery('#mobile_error').html('Ju lutem vendosni nje OTP te vlefshme');
                        }
                    }
                    
                });
            }
        }
        </script>      
<?php require ('footer.php'); ?>