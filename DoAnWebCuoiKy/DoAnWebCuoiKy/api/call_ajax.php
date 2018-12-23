<?php
require_once '../lib/db.php';
$s1=$_REQUEST["n"];
$select_query="select * from sanpham where tensanpham like '%".$s1."%'";


$sql=load($select_query);
$s="";
while($row=$sql->fetch_assoc())
{
	$s=$s."
<li>
	<a class='link-p-colr' href='details.php?idsanpham=".$row['MaSanPham']."'>


                	<img  src='".$row['HinhURL']."'/>
               <h3>".$row['TenSanPham']."</h3>
             <span class='price'>".number_format($row['GiaSanPham'])."</span>


	</a>
</li>




"	;
}
echo $s;
?>

