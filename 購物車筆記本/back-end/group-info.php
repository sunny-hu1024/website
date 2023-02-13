<?php

session_start();
require_once 'sql-connect.php';

$title = $_POST[ "title"]; //title
$user_id = $_SESSION['uid']; //title

# 檢查檔案是否上傳成功
if ( $_FILES[ 'user-update' ][ 'error' ] === UPLOAD_ERR_OK ) {

  $filename = $_FILES[ 'user-update' ][ 'name' ];
  $file = $_FILES[ 'user-update' ][ 'tmp_name' ];
  $filetype = $_FILES[ 'user-update' ][ 'type' ];
  $filesize = $_FILES[ 'user-update' ][ 'size' ];

  //$fileContents = fread( $file);
   $fileContents = base64_encode(file_get_contents($file));

  //新增圖片到資料庫
  $sql = "INSERT INTO Classification(title,picture,mid) VALUES ('$title','$fileContents',$user_id)";
  echo $sql;
  $result = mysqli_query( $link, $sql );

} else {

  echo "<script>alert('分類建立失敗!');history.back();</script>";
}

echo "<script>alert('分類建立成功!');history.back();</script>";

?>