<?php
require_once 'back-end/session.cfg.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>錯題一覽</title>
</head>

<link rel="stylesheet" href="css/bg-style.css?t=1">
<link rel="stylesheet" href="css/qlist-style.css?t=7">
<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li><a href="about-me.php">個人頁面</a> </li>
    <li><a href="mynote.php">我的筆記本</a> </li>
    <li><a href="back-end/logout.php">離開</a> </li>
  </ul>
</div>

<!--題目瀏覽-->
<div class="content"> 
  
  <!--新增錯題按鈕-->
  <input type="button" value="新增題目" id="add" name="add_bnt">
  <dialog id="add-item">
    <div class="list">
      <form action="back-end/add-ques.php" enctype="multipart/form-data" method="post">
        <?php
        if ( isset( $_GET[ "id" ] ) ) {
          echo "<input type='hidden' name='id' value='$_GET[id]' >";
        }
        ?>
        <table>
          <tr>
            <td>題目標題</td>
            <td>題目圖片上傳</td>
            <td>題目類型</td>
            <td>重要度</td>
          </tr>
            <tr>
          
          <td><input type="text" name="qname" placeholder="編輯題目標題"></td>
          <td><input type="file" name="qcontain"></td>
          <td><input type="text" name="qtype" placeholder="請輸入題目類型"></td>
            <td>
            <select name="importance">
          
          <option>請選擇題目重要程度</option>
          <option value=1>1顆星</option>
          <option value=2>2顆星</option>
          <option value=3>3顆星</option>
          <option value=4>4顆星</option>
          <option value=5>5顆星</option>
            </td>
          
            </tr>
          
        </table>
        <p>
          <input type="submit" id="ok" value="確定新增">
          <input type="button" id="close" value="返回">
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
			let infoModal=document.querySelector("#add-item");
			let editInfoModal=document.querySelector("#edit-item");
			let remarkInfoModal=document.querySelector("#remark-item");
	  		let close=document.querySelector("#close");
	  
			btn.addEventListener("click", function(){
			  infoModal.showModal();
			})
	  		close.addEventListener("click", function(){
			  infoModal.close();
			})
	</script>
  
  <!--關鍵字查詢-->
  <form action="" method="get"> 
		<input name="id" value="<?php echo $_GET["id"]; ?>" hidden>
    <div class="search">
      <input type="text" name="key" placeholder="請輸入關鍵字">
      <input type="submit" value="查詢">
    </div>
		</form>
  <div class="container" >
    <div class="base-flex">
	  <div class=" " >
    
      </div>
      <div class=" " >
        <div>題目名稱</div>
        <div >題型</div>
        <div >重要程度</div>
      </div>
      <?php

      require_once 'back-end/sql-connect.php';

      $sql = "SELECT * FROM `question` WHERE cid='$_GET[id]'";
	  if(isset($_GET["key"])) {
		  $sql = $sql . " and qtitle like '%$_GET[key]%'";
	  }

      $qlist = mysqli_query( $link, $sql );

      if ( $qlist && mysqli_num_rows( $qlist ) > 0 ) {

        while ( $row = mysqli_fetch_assoc( $qlist ) ) {
		   //echo "<div>";
          echo "<a class='ques-info' href='viewQuesion.php?qid=$row[qid]'>";
          echo "<div class='name-block'>$row[qtitle]</div>";
          echo "<div class='type-block'>$row[qtype]</div>";
          switch ( $row['importance'] ) {
            case 1:
              echo "<div class='img-content'><img src='image/impor1.png'></div>";
              break;
            case 2:
              echo "<div class='img-content'><img src='image/impor2.png'></div>";
              break;
            case 3:
              echo "<div class='img-content'><img src='image/impor3.png'></div>";
              break;
            case 4:
              echo "<div class='img-content'><img src='image/impor4.png'></div>";
              break;
            case 5:
              echo "<div class='img-content'><img src='image/impor5.png'></div>";
              break;
          }
          echo "<div class='space'>&nbsp;</div>";

		  //刪除功能
          echo "<div class='del'><form action='back-end/ques-del.php' method='POST'>";
          echo "<input type='hidden' name='qid' value='$row[qid]'>";
          echo "<p><input type='submit' id='buy' value='刪除'></p>";
          echo "</form></div>";
		  //echo "</div>";
          echo "</a>";
		  

        }
      }
      ?>
    </div>
  </div>
</body>
</html>
