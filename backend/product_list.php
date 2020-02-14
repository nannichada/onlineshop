<?php
//1. เชื่อมต่อ database:
include('include/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM tbl_product as p 
INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

echo  ' <table  class="table table-hover">';
  //หัวข้อตาราง
    echo "<tr>
      <td width='5%'>ID</td>
      <td width=40%>ชนิด</td>
      <td width=4o%>ชื่อสินค้า</td>
      <td width=25%>รูปภาพ</td>
      <td width=40%>ราคา</td>
      <td width=40%>รายละเอียด</td>
      <td width=5%>แก้ไข</td>
      <td width=5%>ลบ</td>
    </tr>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td>" .$row["p_id"] .  "</td> ";
    echo "<td>" .$row["type_name"] .  "</td> ";
    echo "<td>" .$row["p_name"] .  "</td> ";
    echo "<td align=center>"."<img src='p_img/".$row["p_img"]."' width='100'>"."</td>";
    echo "<td>" .$row["price"] .  "</td> ";
    echo "<td>" .$row["p_detail"] .  "</td> ";
    //แก้ไขข้อมูล
    echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btn-warning btn-sm'>แก้ไข</a></td> ";
    
    //ลบข้อมูล
    echo "<td><a href='product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-sm'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>