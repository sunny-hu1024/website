<?php
require_once 'back-end/session.cfg.php';
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/bg-style.css?t=1">
<link rel="stylesheet" href="css/group-style.css?t=10">
<meta charset="utf-8">
<title>我的購物車</title>
</head >
<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li><a href="record.php">購買紀錄</a> </li>
    <li><a href="mycar.php">我的購物車</a> </li>
    <li><a href="back-end/logout.php">會員登出</a> </li>
  </ul>
  <button id="add">新增分類</button>
  <dialog id="add-group">
    <div class="list">
      <form action="back-end/group-info.php" enctype="multipart/form-data" method="post">
        <table>
          <tr>
            <td>圖片</td>
            <td>分類名稱</td>
          </tr>
          <tr>
            <td><input type="file" name="user-update"></td>
            <td><input type="text" name="title" value="請輸入分類名稱"></td>
          </tr>
        </table>
        <p>
          <input type="submit" id="close" value="確定新增">
        </p>
      </form>
    </div>
  </dialog>
  <style>	
		dialog{
		  border: none;
		  box-shadow: 0 2px 6px #ccc;
		  border-radius: 10px;
		}

		dialog::backdrop {
		  background-color: rgb(235,232,226);
		}
	</style>
  <script>
			let btn=document.querySelector("#add");
			let infoModal=document.querySelector("#add-group");
			let close=document.querySelector("#close");
			btn.addEventListener("click", function(){
			  infoModal.showModal();
			})
			close.addEventListener("click", function(){
			  infoModal.close();
			})
		</script> 
</div>
<div class="content">
  <div class="native-bar">
    <div class="native-content">
      <?php
      require_once 'back-end/sql-connect.php';
		
	  $cuser = $_SESSION['uid'];
	  //$sql = "SELECT * FROM `classification`";
      $sql = "SELECT * FROM `classification` WHERE mid='$cuser'";
      $group = mysqli_query( $link, $sql );

      if ($group && mysqli_num_rows( $group ) > 0 ) {
        while ( $row = mysqli_fetch_assoc( $group ) ) {
          echo "<a class='item-info' href='item.php?title=$row[title]' >";
          echo "<div class='img-content' ><img src='data:image/jpg;base64,$row[picture]'/></div>";
          echo "<div class='title' >$row[title]</div>";
          echo "<div></div>";
          echo "</a>";
        }

      }

      ?>
    </div>
  </div>
</div>
</body>
</html>
