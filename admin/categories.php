<?php
require ('top.php');
if (isset($_GET['type']) && $_GET['type']!='') {
   $type=get_safe_value($con,$_GET['type']);

   if($type=='status'){
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if ($operation=='active') {
         $status='1';
      }else{
         $status='0';
      }
      $update_status_sql="update categories set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
   }
   if($type=='delete'){
      
      $id=get_safe_value($con,$_GET['id']);
      
      $delete_sql="delete from categories  where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}
$sql="select * from categories order by categories asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h3 class="">Kategoria </h3>
                           <button type="button" class="btn btn-primary" style="margin-top: 5px;"><a href="manage_categories.php" style="color: white;">Shto kategori</a></button>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       
                                       
                                       <th>ID</th>
                                       <th>Kategoria</th>
                                       
                                       <th>Statusi</th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i=1;
                                       while ($row=mysqli_fetch_assoc($res)) {
                                          

                                    ?>
                                    <tr>
                                       <td class="serial"><?php echo $i  ?></td>
                                       
                                       <td><?php echo $row['id'] ?></td>
                                       <td><?php echo $row['categories'] ?> </td>
                                       <td>
                                          <?php 
                                             if ($row['status']==1) {
                                                echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Aktiv</a></span>&nbsp;";
                                             }else{
                                               echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>DeAktiv</a></span>&nbsp;";
                                             }
                                              echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Fshi</a></span>&nbsp;";
                                              echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edito</a></span>&nbsp;";
                                          ?>
                                       </td>
                                       
                                       
                                    </tr>
                                    <?php
                                    $i++;
                                 }
                                    ?>
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
