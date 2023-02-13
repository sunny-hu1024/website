<?php

require_once 'sql-connect.php';

$qname=$_POST["qname"];
$type=$_POST["qtype"];
$imp=$_POST["importance"];
$cid=$_POST["id"];

# 檢查檔案是否上傳成功
if ( $_FILES[ 'qcontain' ][ 'error' ] === UPLOAD_ERR_OK ) {

  $filename = $_FILES[ 'qcontain' ][ 'name' ];
  $file = $_FILES[ 'qcontain' ][ 'tmp_name' ];
  $filetype = $_FILES[ 'qcontain' ][ 'type' ];
  $filesize = $_FILES[ 'qcontain' ][ 'size' ];
	
  //$fileContents = fread( $file);
   $fileContents = base64_encode(file_get_contents($file));

  //新增圖片到資料庫
 $sql = "INSERT INTO question (qtitle,qtype,qtopic,importance,cid) VALUES ('$qname','$type','$fileContents','$imp','$cid')";
 $result = mysqli_query($link, $sql);

} else {

  echo "<script>alert('未上傳題目圖片!');window.history.back();</script>";
}

echo "<script>alert('新增成功!');window.history.back();</script>";

?>