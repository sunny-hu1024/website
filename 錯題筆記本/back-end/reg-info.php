<?php

require_once 'sql-connect.php';

if ( isset( $_POST[ "account" ] ) ) {

  $uname = $_POST[ "user" ];
  $uId = $_POST[ "account" ];
  $uPwd = $_POST[ "pwd" ];
  $uPwd_aga = $_POST["pwd-again" ];
  $tname = $_POST[ "test" ];
  $tdate = $_POST[ "test_date" ];


  if ( $uPwd == $uPwd_aga ) {

    $sql = "SELECT * FROM user where username = '$uId'";
    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result)==1){

      echo "<script>alert('此帳號已被其他user使用!');history.back();</script>";

    }
    else if(mysqli_num_rows($result)==0){

      if ( !$result ) {

        die( $conn->error );
        echo "<script>alert('註冊失敗!');history.back();</script>";
  
      } else {

        $SQL = "INSERT INTO  `user` (`user`,`username`,`pwd`,`test_name`,`test_date`) VALUE ('$uname','$uId','$uPwd','$tname','$tdate') ";
        $result_reg = mysqli_query( $link, $SQL );
  
        // 如果有新增成功
        echo "<script>alert('註冊成功!');</script>";
        header( 'Location:../index.php' );
  
      }
    }

  } else {
    
    echo "<script>alert('註冊失敗!');history.back();</script>";
  }

}
?>