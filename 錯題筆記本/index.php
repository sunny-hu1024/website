<?php
require_once 'back-end/session.cfg.php';
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/home-style.css?t=6">
<link rel="stylesheet" href="css/login-style.css?t=5">
<meta charset="utf-8">
<title>登入頁面</title>
</head>
<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li><a href="index.php" >個人頁面</a></li>
    <li><a href="index.php">我的筆記本</a> </li>
    <li><a href="register.php">會員註冊</a> </li>
  </ul>
</div>
<div class="content"> 
  <!-- Feature -->
  <div class="log-bg">
    <div class="log-in">
      <form action="back-end/log-access.php" method="post">
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

</body>
</html>
