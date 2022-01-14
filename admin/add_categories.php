<?php
require ('top.php');
if (isset($_POST['submit'])) {
   $categories=get_safe_value($con,$_POST['categories']);
   mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
   header('location:categories.php');
   die();

}
?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Categories</strong><br>
                            <button type="button" class="btn btn-success" style="margin-top: 5px;"><a href="categories.php" style="color: white;">Back</a></button>
                        </div>
                        <form method="post">
                        <div class="card-body card-block">
                           <div class="form-group">
                              <label for="categories" class=" form-control-label">Categories</label>
                              <input type="text" name="categories" placeholder="Enter your categories name" class="form-control">
                           </div>

                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                        </div>
                     </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
<?php
require ('footer.php');
?>         