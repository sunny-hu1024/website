<?php

require_once 'sql-connect.php';

$item_id=$_POST["item_id"];

$sql =  "DELETE FROM item
		WHERE item_id=$item_id";

$result = mysqli_query( $link, $sql );

echo "<script>alert('編輯成功!');history.back();</script>";


?>