<?php

require_once 'sql-connect.php';

$it_name=$_POST["item-name"];
$url=$_POST["url"];
$web=$_POST["web_name"];
$price=$_POST["price"];
$ctitle=$_POST["title"];
$curr_user = $_SESSION['uid'];

$price_trans = 0;
$is_num = is_numeric($price);

if(!$is_num)
	echo "<script>alert('價錢輸入錯誤!');history.back();</script>";
else{
	
	$price_trans =(int)$price;
}
	

$sql = "INSERT INTO item (pName,url,web_name,price,ctitle,mid) VALUES ('$it_name','$url','$web','$price_trans','$ctitle','$curr_user')";
$result = mysqli_query($link, $sql);

echo "<script>alert('新增成功!');history.back();</script>";

?>