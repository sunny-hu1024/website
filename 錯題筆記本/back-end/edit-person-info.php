<?php
require_once 'sql-connect.php';
 
$uid=$_POST["id"];
$uname = $_POST[ "user" ];
$tname = $_POST[ "test" ];
$tdate = $_POST[ "test_date" ];

$sql = "update user 
        set user = '$uname', test_name = '$tname' , test_date ='$tdate'";

if ( $_FILES[ 'user-update' ][ 'error' ] === UPLOAD_ERR_OK ) {

  $filename = $_FILES[ 'user-update' ][ 'name' ];
  $file = $_FILES[ 'user-update' ][ 'tmp_name' ];
  $filetype = $_FILES[ 'user-update' ][ 'type' ];
  $filesize = $_FILES[ 'user-update' ][ 'size' ];

   $fileContents = base64_encode(file_get_contents($file));
   $sql = $sql .", profile = '$fileContents' where uid ='$uid'";
}

  $result = mysqli_query($link, $sql);
  echo "<script>alert('編輯成功!');history.back();</script>";
?>