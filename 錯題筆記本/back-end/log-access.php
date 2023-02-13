<?php
ob_start();
session_start();
require_once 'sql-connect.php';

if ( isset( $_POST[ "uaccount" ] ) ) {
  if ( $_POST[ "uaccount" ] != null ) {
    $uId = $_POST[ "uaccount" ];
    $uPwd = $_POST[ "upsw" ];


    $SQL = "SELECT uid FROM user WHERE username='$uId' AND pwd='$uPwd'";
    $result = mysqli_query( $link, $SQL );

    if ( mysqli_num_rows( $result ) == 1 ) {

      $curr_user = implode( "", $result->fetch_assoc() );
      $_SESSION[ 'uid' ] = $curr_user;
      echo "<script>alert('登入成功，繼續努力為夢想奮鬥!');</script>";
      header( "location:../mynote.php" );

    } else {

      echo "<script>alert('登入失敗!');history.back();</script>";
    }

  } else {
    echo "<script>alert('您尚未輸入帳號或密碼!');history.back();</script>";
  }
} else {

}

//如果出現header already sent
//ob_flush();
?>