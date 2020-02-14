<!DOCTYPE html>
<html>
<head>
<?php include('include/h.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<head>
  <body>
    <div class="container">
  <?php include('navbar.php');?>
  <p></p>
    <div class="row">
      <div class="col-md-3">
      <h6> สวัสดี คุณ <?php echo $a_name; ?></h6>
        <?php include('menu_left.php');?>  
      </div>

      <div class="col-md-6">
          <a href="type.php?act=add" class="btn-info btn-sm" >เพิ่ม</a>
          <p></p>

          <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('type_form_add.php');
            }elseif ($act == 'edit') {
            include('type_form_edit.php');
            }
            else {
            include('type_list.php');
            }
            ?> 

      </div>
    </div>
  </div>
  </body>
</html>