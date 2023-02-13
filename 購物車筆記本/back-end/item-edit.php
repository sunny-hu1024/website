<?php

require_once 'sql-connect.php';

$it_name=$_POST["item-name"];
$url=$_POST["url"];
$web=$_POST["web_name"];
$price=$_POST["price"];
$if_buy=$_POST["buy"];
$ctitle=$_POST["title"];
$note=$_POST["note"];

$price_trans = 0;

$is_num = is_numeric($price);
if(!$is_num)
	echo "<script>alert('價錢輸入錯誤!');history.back();</script>";
else{
	
	$price_trans =(int)$price;
}

$curr_user = $_SESSION['uid'];
$sql = "UPDATE item 
		SET pName = '$it_name',url = '$url',web_name = '$web',price = '$price',note = '$note'
		WHERE ctitle='$ctitle' AND mid ='$curr_user'";

$result = mysqli_query( $link, $sql );

echo "<script>alert('編輯成功!');history.back();</script>";

if($if_buy){
	
	$sql = "INSERT INTO record(pName,price,ctitle) VALUES ('$it_name','$price_trans','$ctitle')";
	$result = mysqli_query($link, $sql);
}

?>