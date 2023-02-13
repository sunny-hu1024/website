<?php

session_start();
require_once 'sql-connect.php';

$title = $_POST[ "title" ]; //title
$note_type = $_POST[ "note-image" ];
$user_id = $_SESSION[ 'uid' ];

//新增圖片到資料庫
$sql = "INSERT INTO catalog(title,imgid,uid) VALUES ('$title','$note_type',$user_id)";
$result = mysqli_query( $link, $sql );

echo "<script>alert('新筆記建立成功!');history.back();</script>";

?>