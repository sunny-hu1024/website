<?php
require_once 'back-end/session.cfg.php';
?>

<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>商品購買紀錄</title>
</head>

<link rel="stylesheet" href="css/bg-style.css?t=1">
<link rel="stylesheet" href="css/record-style.css?t=4">

<body>
<div class="menu">
  <ul class="drop-down-menu" align="right">
    <li><a href="record.php">購買紀錄</a> </li>
    <li><a href="mycar.php">我的購物車</a> </li>
    <li><a href="back-end/logout.php">會員登出</a> </li>
  </ul>
</div>

<!--購買紀錄瀏覽-->
<div class="content">
  <div class="container" >
    <div class="base-flex">
      <div class=" " >
        <div >編號</div>
        <div>商品名稱</div>
        <div >價錢</div>
        <div >購買時間</div>
        <div >備註</div>
      </div>
      <?php
      //如果出現header already sent


      require_once 'back-end/sql-connect.php';


      if ( isset( $_POST[ "purname" ] ) && isset( $_POST[ "cost" ] ) ) {

        $pname = $_POST[ "purname" ];
        $pcost = $_POST[ "cost" ];
        $uid = $_SESSION[ 'uid' ];
        $add_record = "INSERT INTO record(pName,price,mid,time) VALUES('$pname','$pcost',$uid,NOW())";
        $result = mysqli_query( $link, $add_record );
      }
      $sql = "SELECT * FROM record where mid=$_SESSION[uid] order by time ";
      $record = mysqli_query( $link, $sql );


      if ( $record && mysqli_num_rows( $record ) > 0 ) {
        while ( $row = mysqli_fetch_assoc( $record ) ) {
          echo "<div class='record-info'>";
          echo "<div>$row[rid]</div>";
          echo "<div>$row[pName]</div>";
          echo "<div>$row[price]</div>";
          echo "<div>$row[time]</div>";
          echo "<div><img src='image/memo.png'></div>";
          echo "</div>";
        }
      }

      ?>
    </div>
    
    <!--查看月總花費功能-->
    <input type="button" value="查看月總花費" id="mcost" name="mon_cost">
    <dialog id="add-group">
      <div class="list">
        <div>請選擇預覽月份
          <form action="back-end/month-total-cost.php" method="post">
            <select name="month" id="m-select">
              <option>月份</option>
              <option value=1>1月</option>
              <option value=2>2月</option>
              <option value=3>3月</option>
              <option value=4>4月</option>
              <option value=5>5月</option>
              <option value=6>6月</option>
              <option value=7>7月</option>
              <option value=8>8月</option>
              <option value=9>9月</option>
              <option value=10>10月</option>
              <option value=11>11月</option>
              <option value=12>12月</option>
            </select>
            <input type="submit" value="確定">
          </form>
        </div>
        <p>
          <input type="button" id="close" value="離開">
        </p>
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
			let btn=document.querySelector("#mcost");
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
</div>
</body>
</html>
