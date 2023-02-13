<?php
require_once 'back-end/session.cfg.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bg-style.css?t=1">
	<link rel="stylesheet" href="css/user-page-style.css?t=4">
<title>個人頁面</title>
</head>

<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li><a href="about-me.php">個人頁面</a> </li>
    <li><a href="mynote.php">我的筆記</a> </li>
    <li><a href="back-end/logout.php">離開</a></li>
  </ul>
</div>

<div class="content">
    <?php
          require_once 'back-end/sql-connect.php';
      
          $cuser = $_SESSION[ 'uid' ];
          $sql = "SELECT * FROM `user` WHERE uid='$cuser'";
          $user = mysqli_query( $link, $sql );
        
      
          if ( $user && mysqli_num_rows( $user ) > 0 ) {
            while ( $row = mysqli_fetch_assoc( $user ) ) {
          
          if($row['profile']==null){
            
            echo"<div class='profile'><img src='image/default-profile.png' width=300px'></div>";
          }
          else{
            
            echo "<div class='profile' ><img src='data:image/jpg;base64,$row[profile]'/ width=300px></div>";
          }

          echo"<table>";
		      echo"<caption>個人資料</caption>";
          echo"<tr><td>暱稱:&nbsp;&nbsp;$row[user]</td></tr>";
          echo"<tr><td>帳號:&nbsp;&nbsp;$row[username]</td></tr>";
          echo"<tr><td>密碼:&nbsp;&nbsp;***</td></tr>";
          echo"<tr><td>最近的考試:&nbsp;&nbsp;$row[test_name]</td></tr>";
          echo"<tr><td>考試日期:&nbsp;&nbsp;$row[test_date]</td></tr>";
          echo"<tr><td><input type='button' id='info-edit' class='info-edit-btn' value='編輯個人資料'></td></tr>";
          echo"</table>";
        }
          }
        ?>
</div>

<dialog id="person-edit">
      <form action="back-end/edit-person-info.php" enctype="multipart/form-data" method="post">
        <?php
          echo"<input type='hidden' name='id' value='$_SESSION[uid]'>";
        ?>
        <table>
          <tr>
            <td>大頭貼上傳</td>
            <td>使用者暱稱</td>
            <td>下次考試</td>
            <td>下次考試日期</td>
          </tr>
          <tr>  
            <td><input type="file" name="user-update"></td>
            <td><input type="text" name="user" placeholder="請輸入新使用者暱稱"></td>
            <td><input type="text" name="test" placeholder="請輸入下次考試名稱"></td>
            <td><input type="date" name="test_date" placeholder="請輸入下次考試日期"></td>
          </tr>
          <tr>  
            <td><input type="submit" id="ok" value="確定新增">
            <input type="button" id="close" name="back" value="返回"></td>
          </tr>
        </table>
      </form>
  </dialog>
  <style>	

		dialog{
      height: 20%;
      width:40%;
		  border: none;
		  box-shadow: 0 2px 6px #ccc;
		  border-radius: 10px;
		}

		dialog::backdrop {
		  background-color: rgb(235,232,226);
      opacity: 0.5;
		}
	</style>
  <script>
			let btn=document.querySelector("#info-edit");
			let infoModal=document.querySelector("#person-edit");
			let close=document.querySelector("#close");
			btn.addEventListener("click", function(){
			  infoModal.showModal();
			})
			close.addEventListener("click", function(){
			  infoModal.close();
			})
		</script> 
  
</body>
</html>