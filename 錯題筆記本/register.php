<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/home-style.css?t=4">
<link rel="stylesheet" href="css/reg-style.css?t=11">
<meta charset="utf-8">
<title>註冊頁面</title>
</head >
<body>
<div>
  <div class="menu">
    <ul class="drop-down-menu" align="right">
      <li><a href="index.php">個人頁面</a></li>
      <li><a href="index.php">我的筆記</a> </li>
      <li><a href="index.php">會員登入</a> </li>
    </ul>
  </div>
</div>
<div class="content"> 
  <!-- Feature -->
  <div class="reg-bg">
    <div class="reglist">
      <form action="back-end/reg-info.php" method="post" class='register'>
        <table>
          <tr>
            <td align="center">暱稱&nbsp;&nbsp;</td>
            <td><input type="text" name="user" maxlength="20" placeholder="請輸入暱稱" required="required"></td>
          </tr>
          <tr>
            <td align="center">帳號&nbsp;&nbsp;</td>
            <td><input type="text" name="account"  maxlength="20" placeholder="請輸入帳號" required="required"></td>
          </tr>
          <tr>
            <td align="center">密碼&nbsp;&nbsp;</td>
            <td><input type="password" name="pwd" placeholder="請輸入密碼" required="required"></td>
          </tr>
          <tr>
          <tr>
          <tr>
            <td align="center">再次輸入密碼&nbsp;&nbsp;</td>
            <td><input type="password" name="pwd-again"  placeholder="請再次輸入密碼" required="required"></td>
          </tr>
          <tr>
          <tr>
            <td align="center">最近考試&nbsp;&nbsp;</td>
            <td><input type="text" name="test"  placeholder="請輸入最近在準備的考試" required="required"></td>
          </tr>
          <tr>
            <td align="center">最近考試日期&nbsp;&nbsp;</td>
            <td><input type="date" name="test_date"  placeholder="最近在準備考試日期" required="required"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="" value="確定"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

</body>
</html>
