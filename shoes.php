<!DOCTYPE html>
<?php
session_start();
include('include/condb.php');

$sql="SELECT * FROM `tbl_product` WHERE `type_id`=2";
$result=mysqli_query($con,$sql);
if(isset($_POST["add_product"])){
      if(isset($_SESSION["shopping_cart"])){
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'=>$_GET["id"],
                     'item_name'=>$_POST["hidden_name"],
                     'item_price'=>$_POST["hidden_price"],
                     'item_quantity'=>$_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }else{
                echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
                echo '<script>window.location="index.php"</script>';
           }
      }else{
           $item_array = array(
                'item_id'=>$_GET["id"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["hidden_price"],
                'item_quantity'=>$_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }
if(isset($_GET['action'])){
  if($_GET['action']=="delete"){
  foreach ($_SESSION['shopping_cart'] as $key => $value) {
    if($value['item_id']==$_GET['id']){
        unset($_SESSION['shopping_cart'][$key]);
        echo '<script>alert("ลบเรียบร้อย")</script>';
        echo '<script>window.location="index.php"</script>';
      }
    }
  }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เครื่องประดับ</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <style type="text/css">
      img.img-resize {
        width: 205px;
        height: 205px;
      }
      div.product {
        border:1px  solid #CCD1D1;
        background-color:white;
        border-radius:5px;
        padding:1px;
        margin:1px;
      }
      h4{
        font-size: 16px;
      }
</style>
</head>
<body>  
   <?php include('header.php'); ?>
    <div class="section">
        <div class="container">
            <div class="row">
    <?php
        while($row=mysqli_fetch_array($result)){
    ?>
    <center><div class="col-md-3" >
        <form method="post" action="index.php?action=add&id=<?php echo $row['p_id'];?>">
        <div  class="product">
          <img src="backend/p_img/<?php echo  $row['p_img'];?>" class="img-resize" /><br>
          <h4 class="text-info">สินค้า : <?php echo $row['p_name'];?></h4>
          <h4 class="text-danger">ราคา: <?php echo number_format($row['price'],2);?> บาท</h4>
          <input type="text" name="quantity" class="form-control" value="1"/>
          <input type="hidden" name="hidden_name" value="<?php echo $row['p_name'];?>"/>
          <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>"/>
          <input type="submit" name="add_product" style="margin-top:5px;" class="btn btn-success" value="เพิ่มลงตะกร้า"/>
        </div>
        </form>
    </div></center>
    <?php
        }
    ?>
    <br>
    <div style="clear:both;"></div>
    <br>
      <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th>สินค้า</th>
          <th>จำนวน</th>
          <th>ราคา</th>
          <th>รวม</th>
          <th>การดำเนินการ</th>
        </tr>
        <?php
          if(!empty($_SESSION["shopping_cart"])){
              $total=0;
              foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
              <tr>
                <td><?php echo $value['item_name'];?></td>
                <td><?php echo $value['item_quantity'];?></td>
                <td><?php echo number_format($value['item_price'],2);?></td>
                <td><?php echo number_format($value['item_price']*$value['item_quantity'],2);?></td>
                <td><a href="index.php?action=delete&id=<?php echo $value['item_id'];?>">ลบสินค้า</td>
              </tr>
          <?php
              $total=$total+($value['item_price']*$value['item_quantity']);
              }
          ?>
          <tr>
              <td colspan="3" align="right">ราคารวม</td>
              <td align="right">฿ <?php echo number_format($total, 2); ?></td>
              <td></td>
              </tr>
          <?php
          }
        ?>
      </table>
      <!-- <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?> -->
    </div>
    </div>
   </div>
  </div>
</div>
</div>
</div>
</div>
    <footer id="footer">
        <div class="section">
            <div class="container">
              <center> <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-phone"></i>0626935980</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>nannichada11@hotmail.com</a></li>
                            </ul>
                        </div>
                    </div>
            </div></center> 
        </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>