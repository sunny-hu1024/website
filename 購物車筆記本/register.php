<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/home-style.css?t=3">
<link rel="stylesheet" href="css/reg-style.css?t=9">
<meta charset="utf-8">
<title>註冊頁面</title>
</head >
<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li class = "p1"><a href="login.php">購買紀錄</a></li>
    <li class = "p2" ><a href="login.php">我的購物車</a> </li>
    <li><a href="login.php">會員登入</a> </li>
  </ul>
</div>
<div class="content"> 
  <!-- Feature -->
  <div class="reg-bg">
    <div class="reglist">
      <form action="" method="post" class='register'>
        <table>
          <tr>
            <center>
              <td align="center">帳號&nbsp;&nbsp;</td>
            </center>
            <center>
              <td><input type="text" name="account" onkeyup=" value=value.replace(/[^\w\.\/]/ig,'')" maxlength="20" placeholder="請輸入您要設定的帳號" required="required"></td>
            </center>
          </tr>
          <tr>
            <td align="center">密碼&nbsp;&nbsp;</td>
            <td><input type="password" name="pwd" onkeyup=" value=value.replace(/[^\w\.\/]/ig,'')" placeholder="請輸入您要設定的密碼" required="required"></td>
          </tr>
          <tr>
          <tr>
          <tr>
            <td align="center">再次輸入密碼&nbsp;&nbsp;</td>
            <td><input type="password" name="pwd-again" onkeyup=" value=value.replace(/[^\w\.\/]/ig,'')" placeholder="請輸入您要設定的密碼" required="required"></td>
          </tr>
          <tr>
          <tr>
            <td colspan="2"><input type="reset" name="" value="清除資料">
              <input type="submit" name="" value="確定"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php

require_once 'back-end/sql-connect.php';

if ( isset( $_POST[ "account" ] ) ) {

  $uId = $_POST[ "account" ];
  $uPwd = $_POST[ "pwd-again" ];
  $uPwd_aga = $_POST[ "pwd" ];


  if ( $uPwd == $uPwd_aga ) {

    $SQL = "INSERT INTO  `member` (`uName`,`Pwd`) VALUE ('$uId','$uPwd') ";

    $result = mysqli_query( $link, $SQL );
    if ( !$result ) {

      die( $conn->error );
      echo "<script>alert('註冊失敗!');history.back();</script>";

    } else {

      // 如果有新增成功
      echo "<script>alert('註冊成功!');</script>";
      header( 'Location:login.php' );

    }
  }
  else {
	  echo "<script>alert('註冊失敗!');history.back();</script>";
  }

}
?>
</body>
</html>
