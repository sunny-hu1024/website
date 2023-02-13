<?php

require_once 'sql-connect.php';

$qid=$_POST["qid"];

$sql =  "DELETE FROM question
		WHERE qid=$qid";

$result = mysqli_query( $link, $sql );

echo "<script>alert('刪除成功!');history.back();</script>";

?>