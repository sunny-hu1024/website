<?php 
require_once 'back-end/sql-connect.php';

$sql = "SELECT * FROM `question` WHERE qid='$_GET[qid]'";
$ques = mysqli_query( $link, $sql );
$row = mysqli_fetch_assoc( $ques )
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>瀏覽錯題內容</title>
<link rel="stylesheet" href="css/que-style.css?t=6">
  <style>	
		dialog{
		  border: none;
		  box-shadow: 0 2px 6px #ccc;
		  border-radius: 10px;
		  margin: auto;
		  padding: 1em;
		}

		dialog::backdrop {
		  background-color: rgb(235,232,226);
		}
	</style>
</head>
<body> 

<dialog id="edit-item">
  <div class="list">
    <form action="back-end/edit-ques.php" enctype="multipart/form-data" method="post">
      <?php
        echo "<input type='text' name='id' value='$_GET[qid]' hidden>";
      ?>
      <table>
        <tr>
          <td>題目標題</td>
          <td>題目圖片上傳</td>
          <td>題目類型</td>
          <td>重要度</td>
          <td>答案</td>
          <td>筆記</td>
        </tr>
        <tr>
          <td><input type="text" name="qname" placeholder="編輯標題名稱" value="<?php echo $row["qtitle"] ?>"></td>
          <td><input type="file" name="qcontain"></td>
          <td><input type="text" name="qtype" value="<?php echo $row["qtype"] ?>" placeholder="請輸入題目類型"></td>
          <td>
            <select name="importance" value="<?php echo $row["importance"] ?>">

              <option>請選擇題目重要程度</option>
              <option value=1 <?php if ($row["importance"] == 1) echo 'selected="selected"'  ?>  >1顆星</option>
              <option value=2 <?php if ($row["importance"] == 2) echo 'selected="selected"'  ?> >2顆星</option>
              <option value=3 <?php if ($row["importance"] == 3) echo 'selected="selected"'  ?> >3顆星</option>
              <option value=4 <?php if ($row["importance"] == 4) echo 'selected="selected"'  ?> >4顆星</option>
              <option value=5 <?php if ($row["importance"] == 5) echo 'selected="selected"'  ?> >5顆星</option>
			</select>
          </td>
		  <td><textarea cols="50" rows="5" name="ans"><?php echo $row["ans"] ?></textarea></td>
		  <td><textarea cols="50" rows="5" name="qnote"><?php echo $row["qnote"] ?></textarea></td>
        </tr>
      </table>
      <p>
        <input type="submit" id="ok" value="確定編輯">
        <input type="button" id="close" value="返回">
      </p>
    </form>
  </div>
</dialog>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li><a href="about-me.php">個人頁面</a></li>
    <li><a href="mynote.php">我的筆記本</a></li>
    <li><a href="back-end/logout.php">離開</a></li>
  </ul>
</div>
<div class="viewQuesionContent" >
<input type="button" class="back" value="回上一頁" onclick="history.go(-1);">

	<div class="container"><div class="card">
	
	<?php

	  echo"<div class='chapter'>";
	  echo"<h1 align='center'>$row[qtitle]</h1>";
	  echo"<form action=''>";
	  echo"<input type='hidden' name='qid' value='$row[qid]'>";
	  echo"<input type='button' id='edit' class='edit-btn' value='編輯'>";
	  echo"</form>";
	  echo"</div>";

	  echo"<div class='main'>";
	  echo "<div class='topic'>";
	  echo"<div class='introduce'>";
	  echo"<ul>";
	  echo"<li>題目類型&nbsp;&nbsp;$row[qtype]</li>";
	  echo"<br>";
	  switch ( $row['importance'] ) {
		case 1:
		  echo "<li>題目重要度&nbsp;&nbsp;<img height='12px' src='image/impor1.png'></li>";
		  break;
		case 2:
		  echo "<li>題目重要度&nbsp;&nbsp;<img height='12px' src='image/impor2.png'></li>";
		  break;
		case 3:
		  echo "<li>題目重要度&nbsp;&nbsp;<img height='12px' src='image/impor3.png'></li>";
		  break;
		case 4:
		  echo "<li>題目重要度&nbsp;&nbsp;<img height='12px' src='image/impor4.png'></li>";
		  break;
		case 5:
		  echo "<li>題目重要度&nbsp;&nbsp;<img height='12px' src='image/impor5.png'></li>";
		  break;
	  }
	  echo"<br>";
	  echo"<li>答案&nbsp;&nbsp;<input type='button' name='ans' id='ansbtn' class='click-me'  value='點我看答案'></li>";
	  echo"<li id='ans' class='hidden'>$row[ans]</li>";
	  echo"</ul>";
	  echo"</div>";

	  echo "<div class='questionImg'><img src='data:image/jpg;base64,$row[qtopic]'/></div>";
	  echo "</div>";
	  // echo"</div>";
	  echo"<div class='notet'>筆記</div>";
	  echo"<div class='note'>";
	  echo"<p><textarea cols='150' rows='15' name='qnote' readonly='readonly' style='background: rgba(255, 255, 255, 0.5);border-style:none;font-size:18px;'>$row[qnote]</textarea></p>";
	  echo" </div>";
	?>
	</div></div>
</div>
<script> 
let btn=document.querySelector("#edit");
let editInfoModal=document.querySelector("#edit-item");
let close=document.querySelector("#close");
let seeans=document.querySelector("#ansbtn");

var click_times=0;

btn.addEventListener("click", function(){
  editInfoModal.showModal();
})
close.addEventListener("click", function(){
  editInfoModal.close();
})
seeans.addEventListener("click", function(){
	
	click_times=click_times+1;
	if(click_times%2==0){

		var element = document.getElementById("ans");
		element.classList.add("hidden");
	}
	else{

		var element = document.getElementById("ans");
		element.classList.remove("hidden");
	}
  
})

</script>

</body>
</html>