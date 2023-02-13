<?php

require_once 'sql-connect.php';
$qid = $_POST["id"];
$qname=$_POST["qname"];
$type=$_POST["qtype"];
$imp=$_POST["importance"];
$ans=$_POST["ans"];
$qnote=$_POST["qnote"];
# 檢查檔案是否上傳成功
$sql = "update question set qtitle = '$qname', qtype = '$type', importance = '$imp' ,ans = '$ans' , qnote ='$qnote' ";
if ( $_FILES[ 'qcontain' ][ 'error' ] === UPLOAD_ERR_OK ) {

  $filename = $_FILES[ 'qcontain' ][ 'name' ];
  $file = $_FILES[ 'qcontain' ][ 'tmp_name' ];
  $filetype = $_FILES[ 'qcontain' ][ 'type' ];
  $filesize = $_FILES[ 'qcontain' ][ 'size' ];
  //$fileContents = fread( $file);
   $fileContents = base64_encode(file_get_contents($file));
   $sql = $sql .", qtopic = '$fileContents' ";
}
  //新增圖片到資料庫
$sql = $sql ." where qid = $qid";
//echo $sql
$result = mysqli_query($link, $sql);
echo "<script>alert('新增成功!');window.history.back();</script>";

?>