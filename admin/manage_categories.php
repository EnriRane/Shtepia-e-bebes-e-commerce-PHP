<?php
  require('top.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
   $id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"select * from categories where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $categories=$row['categories'];
   }else{
      header('location:categories.php');
      die();
   }
}

if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['categories']);
   $res=mysqli_query($con,"select * from categories where categories='$categories'");
   $check=mysqli_num_rows($res);
   if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){
         
         }else{
            $msg="Kategoria tashme ekziston";
         }
      }else{
         $msg="Kategoria tashme ekziston";
      }
   }
   
   if($msg==''){
      if(isset($_GET['id']) && $_GET['id']!=''){
         mysqli_query($con,"update categories set categories='$categories' where id='$id'");
      }else{
         mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
      }
      header('location:categories.php');
      die();
   }
}


?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Shto kategori</strong><br>
                            <button type="button" class="btn btn-success" style="margin-top: 5px;"><a href="categories.php" style="color: white;">Kthehu mbrapa</a></button>
                        </div>
                        <form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Kategoria</label>
                              <input type="text" name="categories" placeholder="Vendos emrin e kategorise" class="form-control" value="<?php  echo $categories ?>">
                           </div>

                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Perfundo</span>
                           </button>
                        </div>
                     </form>
                      <div style="color: red; text-align: center; margin-top: 10px; "> <?php echo $msg ?></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
<?php
require ('footer.php');
?>         