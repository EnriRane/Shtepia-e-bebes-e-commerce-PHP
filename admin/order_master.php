<?php

require ('top.php');
if (isset($_GET['type']) && $_GET['type']!='') {
   $type=get_safe_value($con,$_GET['type']);

   
   if($type=='delete'){
      
      $id=get_safe_value($con,$_GET['id']);
      
      $delete_sql="delete from users  where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h3 class="">Porosite </h3>
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table">
                     <thead>
                        <tr>
                           <th class="product-thumbnail">ID e porosise</th>
                           <th class="product-name"><span class="nobr">Data e porosise</span></th>
                           <th class="product-name"><span class="nobr">Emri i porositesit</span></th>
                           <th class="product-price"><span class="nobr"> Adresa Dhe Telefoni </span></th>
                           <th class="product-stock-stauts"><span class="nobr"> Lloji i pageses </span></th>
                           <th class="product-stock-stauts"><span class="nobr"> Statusi i porosise </span></th>
                           <th class="product-stock-stauts"><span class="nobr"> Statusi i shperndarjes se produktit </span></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
                        while($row=mysqli_fetch_assoc($res)){
                          $porositesi= $row['user_id'];
                           $sqlBebe = "SELECT * FROM  users WHERE id='$porositesi'";
                           $resultBebe = mysqli_query($con, $sqlBebe);
                           while($row1=mysqli_fetch_assoc($resultBebe)){
                           $emriPorositesit=$row1['name'];
                           }

                        ?>
                        <tr>
                           <td class="product-add-to-cart"><a href="order_master_detail.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a>
                           <br><a href="../order_pdf.php?id=<?php echo $row['id']?>">PDF</a></td><br/>
                           <td class="product-name"><?php echo $row['added_on']?></td>
                           <td class="product-name"><?php echo $emriPorositesit?></td>
                           <td class="product-name">
                           <?php echo $row['address']?><br/>
                           <?php echo $row['city']?><br/>
                           <?php echo $row['pincode']?>
                           </td>
                           <td class="product-name"><?php echo $row['payment_type']?></td>
                           <td class="product-name"><?php echo $row['payment_status']?></td>
                           <td class="product-name"><?php echo $row['order_status_str']?></td>
                           
                        </tr>
                        <?php } ?>
                     </tbody>
                     
                  </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
<?php

require ('footer.php');

?>
