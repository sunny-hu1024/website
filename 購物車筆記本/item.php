<?php
require_once 'back-end/session.cfg.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品內容</title>
</head>

<link rel="stylesheet" href="css/bg-style.css?t=1">
<link rel="stylesheet" href="css/itemList-style.css?t=4">
<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li><a href="record.php">購買紀錄</a> </li>
    <li><a href="mycar.php">我的購物車</a> </li>
    <li><a href="back-end/logout.php">會員登出</a> </li>
  </ul>
</div>

<!--商品瀏覽-->
<div class="content"> 
	
  <!--新增商品按鈕-->
  <input type="button" value="新增商品" id="add" name="add_bnt">
  <dialog id="add-item">
    <div class="list">
      <form action="back-end/item-info.php" method="post">
        <?php
        if ( isset( $_GET[ "title" ] ) ) {
          echo "<input type='text' name='title' value='$_GET[title]' hidden>";
        }
        ?>
        <table>
          <tr>
            <td>商品名稱</td>
            <td>網址</td>
            <td>網站</td>
            <td>價錢</td>
          </tr>
          <tr>
            <td><input type="text" name="item-name" placeholder="編輯商品名稱"></td>
            <td><input type="text" name="url" placeholder="請貼上網址"></td>
            <td><input type="text" name="web_name" placeholder="輸入網站名稱"></td>
            <td><input type="text" name="price" placeholder="輸入商品價格"></td>
          </tr>
        </table>
        <p>
          <input type="submit" id="ok" value="確定新增">
        </p>
      </form>
    </div>
  </dialog>
  
  <!--編輯商品功能-->
  <dialog id="edit-item">
    <div class="list">
      <form action="back-end/item-edit.php" method="post">
        <?php
        if ( isset( $_GET[ "title" ] ) ) {
          echo "<input type='text' name='title' value='$_GET[title]' hidden>";
        }
        ?>
        <table>
          <tr>
            <td>商品名稱</td>
            <td>網址</td>
            <td>網站</td>
            <td>備註</td>
            <td>價錢</td>
          </tr>
          <tr>
            <td><input type="text" id="edit-item-name" name="item-name" placeholder="編輯商品名稱"></td>
            <td><input type="text" id="edit-url" name="url" placeholder="請貼上網址"></td>
            <td><input type="text" id="edit-web_name" name="web_name" placeholder="輸入網站名稱"></td>
            <td><input type="text" id="edit-note" name="note" placeholder="備註"></td>
            <td><input type="text" id="edit-price" name="price" placeholder="輸入商品價格"></td>
          </tr>
        </table>
        <p>
          <input type="submit" id="ok" value="確定編輯">
        </p>
      </form>
    </div>
  </dialog>
  <dialog id="remark-item">
    <div class="list">
      <div id="remark-info"></div>
	  <button onclick="closeRemark()" >關閉</button>
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
			let infoModal=document.querySelector("#add-item");
			let editInfoModal=document.querySelector("#edit-item");
			let remarkInfoModal=document.querySelector("#remark-item");
			let submit=document.querySelector("#ok");
	  		let close=document.querySelector("#close");
	  
			btn.addEventListener("click", function(){
			  infoModal.showModal();
			})
	  		submit.addEventListener("click", function(){
			  infoModal.close();
			})
		
			function editData(pName,url,web_name,price,note) {
				editInfoModal.showModal();
				document.getElementById('edit-item-name').value = pName;
				document.getElementById('edit-url').value = url;
				document.getElementById('edit-web_name').value = web_name;
				document.getElementById('edit-price').value = price;
				document.getElementById('edit-note').value = note;
			}
			function openRemark(remark) {
				document.getElementById("remark-info").innerHTML=remark;
				remarkInfoModal.showModal();
			}
			function closeRemark() {
				remarkInfoModal.close();
			}
	</script>
  <div class="container" >
    <div class="base-flex">
      <div class=" " >
        <div>產品名稱</div>
        <div >網址</div>
        <div >網站</div>
        <div >價錢</div>
        <div >備註</div>
        <div >購買狀態</div>
        <div >編輯</div>
        <div >刪除</div>
      </div>
      <?php

      require_once 'back-end/sql-connect.php';
	  $uid=$_SESSION['uid'];
      $sql = "SELECT *,(select count(1) from record WHERE pName = item.pName and mid =$uid ) as rcnt FROM `item` WHERE ctitle='$_GET[title]'";
      $item = mysqli_query( $link, $sql );

      if ( $item && mysqli_num_rows( $item ) > 0 ) {
		  
        while ( $row = mysqli_fetch_assoc( $item ) ) {
			
          echo "<div class='item-info'>";
          echo "<div>$row[pName]</div>";
          echo "<div><a href='$row[url]'>點我前往</a></div>";
          echo "<div>$row[web_name]</div>";
          echo "<div>$row[price]</div>";
          echo "<div><a onclick='openRemark(\"$row[note]\")'><img src='image/memo.png'></a></div>";
		  
		  //已購買功能
          echo "<div><form action='record.php' method='POST'>";
		  echo "<input type='hidden' name='purname' value='$row[pName]'>";
		  echo "<input type='hidden' name='cost' value='$row[price]'>";
			
		  if(!$row['rcnt']){
			  
			  echo "<p><input type='submit' id='buy' value='購買'></p> ";
		  } 
			else {
			  echo "<p>已購買</p> ";
		  }
		  
		  echo "</form></div>";
			
		  //編輯功能
          echo "<div><a onclick='editData(\"$row[pName]\",\"$row[url]\",\"$row[web_name]\",$row[price],\"$row[note]\")'>編輯</a></div>";
			
		  //刪除功能
          echo "<div><form action='back-end/del.php' method='POST'>";
		  echo "<input type='hidden' name='item_id' value='$row[item_id]'>";
		  echo "<p><input type='submit' id='buy' value='刪除'></p>";
		  echo "</form></div>";
		  echo "</div>";
			
		  
        }
      }
      ?>
      
    </div>
  </div>
</div>
</body>
</html>
