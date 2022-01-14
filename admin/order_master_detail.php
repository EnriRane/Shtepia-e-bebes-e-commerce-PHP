<?php
require('top.php');
$order_id=get_safe_value($con,$_GET['id']);
$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value,coupon_code from `order` where id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];
if($coupon_value==''){
   $coupon_value=0;
}
$coupon_code=$coupon_details['coupon_code'];

if(isset($_POST['update_order_status'])){
   $update_order_status=$_POST['update_order_status'];
   if($update_order_status=='5'){
      mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
   }else{
      mysqli_query($con,"update `order` set order_status='$update_order_status' $update_sql where id='$order_id'");
   }
   
}
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
               <h4 class="box-title">Detajet mbi porosine </h4>
            </div>
            <div class="card-body--">
               <div class="table-stats order-table ov-h">
                 <table class="table">
                        <thead>
                           <tr>
                              <th class="product-thumbnail">Emri i produktit</th>
                              <th class="product-thumbnail">Imazhi i produktit</th>
                              <th class="product-name">Sasa</th>
                              <th class="product-price">Cmimi</th>
                              <th class="product-price">Cmimi total</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_detail,product ,`order` where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");
                           $total_price=0;
                           
                           $userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `order` where id='$order_id'"));
                           
                           $address=$userInfo['address'];
                           $city=$userInfo['city'];
                           $pincode=$userInfo['pincode'];
                           
                           while($row=mysqli_fetch_assoc($res)){
                           
                           $total_price=$total_price+($row['qty']*$row['price']);
                           ?>
                           <tr>
                              <td class="product-name"><?php echo $row['name']?></td>
                              <td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
                              <td class="product-name"><?php echo $row['qty']?></td>
                              <td class="product-name"><?php echo $row['price']?></td>
                              <td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                              
                           </tr>
                           <?php } 
                           if($coupon_value!=''){
                           ?>
                           <tr>
                              <td colspan="3"></td>
                              <td class="product-name">Vlera e kuponit</td>
                              <td class="product-name">
                              <?php 
                              echo $coupon_value."($coupon_code)";
                              ?></td>
                              
                           </tr>
                           <?php } ?>
                           <tr>
                              <td colspan="3"></td>
                              <td class="product-name">Cmimi total</td>
                              <td class="product-name"><?php 
                                    echo $total_price-$coupon_value;
                                    ?></td>
                              
                           </tr>
                        </tbody>
                     
                  </table>
                  <div id="address_details">
                     <strong>Adresa :</strong>
                     <?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>
                     <strong>Statusi i shperndarjes se produktit :</strong> 
                     <?php 
                     $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
                     echo $order_status_arr['name'];
                     ?>
                     <br><br>
                     <div>
                        <form method="post">
                           <select class="form-control" name="update_order_status" required>
                              <option value="">Zgjidh statusin</option>
                              <?php
                              $res=mysqli_query($con,"select * from order_status");
                              while($row=mysqli_fetch_assoc($res)){
                                 if($row['id']==$categories_id){
                                    echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                 }else{
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                                 }
                              }
                              ?>
                           </select>
                           <br>
                           <input type="submit" class="form-control" style="background-color:blue; color:white"/>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
          </div>
        </div>
      </div>
   </div>
</div>
<?php
require('footer.php');
?>