<?php
require_once 'back-end/session.cfg.php';
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/home-style.css?t=3">
<link rel="stylesheet" href="css/login-style.css?t=4">
<meta charset="utf-8">
<title>登入頁面</title>
</head >
<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li class = "p1"><a href="login.php" >購買紀錄</a></li>
    <li class = "p2" ><a href="login.php">我的購物車</a> </li>
    <li><a href="register.php">會員註冊</a> </li>
  </ul>
</div>
<div class="content"> 
  <!-- Feature -->
  <div class="log-bg">
    <div class="log-in">
      <form action="" method="post">
        <table>
          <tr>
            <center>
              <td>帳號&nbsp;&nbsp;</td>
            </center>
            <td><input type="text" name="uaccount" style="text-align: center;"  maxlength="30" placeholder="您的帳號"></td>
          </tr>
          <tr>
            <td>密碼&nbsp;&nbsp;</td>
            <td><input type="password" name="upsw" style="text-align: center;"  maxlength="30" placeholder="您的密碼"></td>
          </tr>
          <tr>
            <td><input type="submit" name="login" value="登入" align="right"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php
	
require_once 'back-end/sql-connect.php';

if ( isset( $_POST[ "uaccount" ] ) ) {
  if ( $_POST[ "uaccount" ] != null ) {
    $uId = $_POST[ "uaccount" ];
    $uPwd = $_POST[ "upsw" ];

	  
    $SQL = "SELECT id FROM member WHERE uName='$uId' AND Pwd='$uPwd'";
    $result = mysqli_query( $link, $SQL );
    if ( mysqli_num_rows( $result ) == 1 ) {
		
      $curr_user = implode( "", $result->fetch_assoc() );
	  $_SESSION['uid'] = $curr_user;
    echo "<script>alert('歡迎回到我的購物車!');</script>";
	  header("location:mycar.php");
		
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
</body>
</html>
