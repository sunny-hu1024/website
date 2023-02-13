<?php

require_once 'sql-connect.php';

$month = $_POST[ "month" ];

$sql = "SELECT SUM(price) FROM record where time between '2022-0'+$month+'-01' and '2022-0'+$month+'-30'";
$result = mysqli_query( $link, $sql );

echo json_encode($month); 
?>